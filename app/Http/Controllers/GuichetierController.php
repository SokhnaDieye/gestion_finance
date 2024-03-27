<?php

namespace App\Http\Controllers;

use App\Mail\NouveauCompteMail;
use App\Mail\NouveauDepot;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GuichetierController extends Controller
{
    public function faireDepot(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'rib' => 'required|exists:comptes,rib',
            'montant' => 'required|numeric|min:0',
        ]);
        $compte = Compte::where('rib', $request->rib)->first();

        if (!$compte) {
            return back()->with('erreur', 'Compte introuvable.');
        }
        $compte->solde += $request->montant;
        $compte->save();
        $compte->transactions()->create([
            'type' => 'depot',
            'montant' => $request->montant,
        ]);

        // Envoyer un e-mail de notification de dépôt
        Mail::to($compte->user->email)->send(new NouveauDepot($compte, $request->montant));

        return back()->with('success', 'Dépôt effectué avec succès.');
    }

    public  function  index()
    {
        return view('Guichetier.depotByGuichetier');
    }

}
