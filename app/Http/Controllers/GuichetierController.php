<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class GuichetierController extends Controller
{
    public function faireDepot(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'rib' => 'required|exists:comptes,rib',
            'montant' => 'required|numeric|min:0',
        ]);

        // Récupérer le compte associé au RIB fourni
        $compte = Compte::where('rib', $request->rib)->first();

        // Vérifier si le compte existe
        if (!$compte) {
            return back()->with('erreur', 'Compte introuvable.');
        }

        // Effectuer le dépôt
        $compte->solde += $request->montant;
        $compte->save();

        // Enregistrer la transaction associée
        $compte->transactions()->create([
            'type' => 'depot',
            'montant' => $request->montant,
        ]);

        // Rediriger avec un message de succès
        return back()->with('success', 'Dépôt effectué avec succès.');
    }

    public  function  index()
    {
        return view('Guichetier.depotByGuichetier');
    }

}
