<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    public function faireTransaction(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'rib_destinataire' => 'required|exists:comptes,rib',
            'montant' => 'required|numeric|min:0',
        ]);

        // Récupérer le compte source (celui de l'utilisateur connecté)
        $compteSource = Compte::findOrFail($id);
        if ($compteSource->rib == $request->rib_destinataire)
        {
            return back()->with('erreur', 'vous ne pouver pas transferer a votre propre compte.');
        }
        if ($compteSource->statut !== 'actif') {
            return back()->with('erreur', 'Votre compte est bloqué. Vous ne pouvez pas effectuer de transactions.');
        } else {
            // Récupérer le compte destination (celui spécifié dans le formulaire)
            $compteDestination = Compte::where('rib', $request->rib_destinataire)->first();

            // Vérifier si le compte de destination existe
            if (!$compteDestination) {
                return back()->with('erreur', 'Compte de destination introuvable.');
            }

            // Vérifier si l'utilisateur a atteint la limite mensuelle de transactions
            $transactionsMois = $compteSource->transactions()
                ->where('type', 'debit')
                ->whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->sum('montant');

            if ($transactionsMois + $request->montant > $compteSource->pack->limite_transaction) {
                return back()->with('erreur', 'Vous avez atteint la limite mensuelle de transactions pour votre pack.');
            }

            // Vérifier si le montant est inférieur au solde du compte source
            if ($compteSource->solde < $request->montant) {
                return back()->with('erreur', 'Solde insuffisant.');
            }

            // Effectuer la transaction
            $montantArrondi = round($request->montant, 2);

            DB::transaction(function () use ($compteSource, $compteDestination, $montantArrondi) {
                $compteSource->solde -= $montantArrondi;
                $compteDestination->solde = ($compteDestination->solde ?? 0) + $montantArrondi;

                $transaction = Transaction::create([
                    'compte_id' => $compteSource->id,
                    'type' => 'debit',
                    'montant' => $montantArrondi,
                    'compte_destination_id' => $compteDestination->id,
                ]);

                // Si le montant est ajouté au compte de destination, on crée une transaction correspondante
                if ($compteDestination) {
                    Transaction::create([
                        'compte_id' => $compteDestination->id,
                        'type' => 'credit',
                        'montant' => $montantArrondi,
                        'compte_destination_id' => $compteSource->id,
                    ]);
                }

                $compteSource->save();
                $compteDestination->save();
            });

            // Rediriger avec un message de succès
            return back()->with('success', 'Transaction effectuée avec succès.');
        }
    }
}
