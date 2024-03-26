<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenereteCarteController extends Controller
{
    public function index()
    {

        return view('Client.carte');
    }
    public function genererCarte(Request $request)
    {
        $request->validate([
            'montant_a_deduire' => 'required|numeric|min:0',
        ]);
        $user = Auth::user();

        $compte = $user->comptes->first();
        $montant_a_deduire = $request->input('montant_a_deduire');
        if ($compte->solde < $montant_a_deduire) {
            return response()->json(['error' => 'Solde insuffisant pour générer la carte bancaire'], 422);
        }

        // Déduire le montant du solde du compte
        $compte->solde -= $montant_a_deduire;
        $compte->save();
        return response()->json(['success' => 'Carte bancaire générée avec succès'], 200);
    }
}
