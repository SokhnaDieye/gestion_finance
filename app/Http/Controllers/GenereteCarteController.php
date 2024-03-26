<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenereteCarteController extends Controller
{
    public function index()
    {
        return view('Client.carte');
    }

    public function genererCarte(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();
        $compte = $user->comptes->first();
        $montant_a_deduire = $request->input('montant');
        if ($compte->solde < $montant_a_deduire) {
            return response()->json(['error' => 'Solde insuffisant pour générer la carte bancaire'], 422);
        }
        $compte->solde -= $montant_a_deduire;
        $compte->save();
        $numero_carte = $this->genererNumeroCarte();

        return view('Client.carte', [
            'montant' => $montant_a_deduire,
            'numero_carte' => $numero_carte,
        ]);
    }
    private function genererNumeroCarte()
    {
        $numero = '';
        for ($i = 0; $i < 16; $i++) {
            $numero .= mt_rand(0, 9);
            if (($i + 1) % 4 === 0 && $i < 15) {
                $numero .= ' ';
            }
        }
        return $numero;
    }
}
