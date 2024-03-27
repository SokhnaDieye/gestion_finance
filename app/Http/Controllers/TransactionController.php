<?php

namespace App\Http\Controllers;

use App\Mail\TransactionEffectueeMail;
use App\Models\Compte;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{

    public function faireTransaction(Request $request, $id)
    {
        $request->validate([
            'rib_destinataire' => 'required|exists:comptes,rib',
            'montant' => 'required|numeric|min:0',
        ]);

        $compteSource = Compte::findOrFail($id);
        if ($compteSource->rib == $request->rib_destinataire)
        {
            return back()->with('erreur', 'vous ne pouver pas transferer à votre propre compte.');
        }
        if ($compteSource->statut !== 'actif') {
            return back()->with('erreurBloquer', 'Votre compte est bloqué. Vous ne pouvez pas effectuer de transactions.');
        } else {
            // chercher le compte destinataire
            $compteDestination = Compte::where('rib', $request->rib_destinataire)->first();

            if (!$compteDestination) {
                return back()->with('erreurCompte','Compte de destination introuvable.');
            }
// calculer la somme de l ensemble de ses transaction du mois
            $transactionsMois = $compteSource->transactions()
                ->where('type', 'debit')
                ->whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->sum('montant');

            if ($transactionsMois + $request->montant > $compteSource->pack->limite_transaction) {
                return back()->with('erreur', 'Vous avez atteint la limite mensuelle de transactions pour votre pack.');
            }

            if ($compteSource->solde < $request->montant) {
                return back()->with('erreur', 'Solde insuffisant.');
            }
            if ($request->montant == 0 || $request->montant < 0) {
                return back()->with('erreurMontant', 'Veuillez saisir un montant valide.');
            }

            $montantArrondi = round($request->montant, 2);

            DB::transaction(function () use ($compteSource, $compteDestination, $montantArrondi) {
                $compteSource->solde -= $montantArrondi;
                $compteDestination->solde = ($compteDestination->solde ?? 0) + $montantArrondi;

                $transaction = Transaction::create([
                    'compte_id' => $compteSource->id,
                    'type' => 'débit',
                    'montant' => $montantArrondi,
                    'compte_destination_id' => $compteDestination->id,
                ]);

                if ($compteDestination) {
                    Transaction::create([
                        'compte_id' => $compteDestination->id,
                        'type' => 'crédit',
                        'montant' => $montantArrondi,
                        'compte_destination_id' => $compteSource->id,
                    ]);
                }

                $compteSource->save();
                $compteDestination->save();

                // Envoi de mails aux deux comptes concernés
                Mail::to($compteSource->user->email)->send(new TransactionEffectueeMail($compteSource, $montantArrondi, 'debit'));
                Mail::to($compteDestination->user->email)->send(new TransactionEffectueeMail($compteDestination, $montantArrondi, 'credit'));

            });

            return back()->with('success', 'Transaction effectuée avec succès.');
        }
    }
}
