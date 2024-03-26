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

        return back()->with('success', 'Dépôt effectué avec succès.');
    }

    public  function  index()
    {
        return view('Guichetier.depotByGuichetier');
    }

}
