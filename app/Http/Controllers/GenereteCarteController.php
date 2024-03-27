<?php

namespace App\Http\Controllers;

use App\Models\Carte;
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
        $montant = $request->input('montant');

        if ($compte->solde < $montant || $montant <= 0 ) {
            return back()->with('erreur','Solde insuffisant pour générer la carte bancaire');
        }

        $compte->solde -= $montant;
        $compte->save();

        $numero_carte = $this->genererNumeroCarte();

        // Calcul de la date d'expiration (mois de la création de la carte / année en cours + 1 an)
        $expiration_date = date('m/y', strtotime('+1 year'));

        // Création de la carte
        Carte::create([
            'user_id' => $user->id,
            'numero_carte' => $numero_carte,
            'date_expiration' => $expiration_date,
            'cvv' => mt_rand(100, 999), // Génération du CVV aléatoire à trois chiffres
        ]);

        return redirect()->route('showcartes');
    }


    private function genererNumeroCarte()
    {
        do {
            $numero = '';
            for ($i = 0; $i < 16; $i++) {
                $numero .= mt_rand(0, 9);
                if (($i + 1) % 4 === 0 && $i < 15) {
                    $numero .= ' ';
                }
            }
        } while (Carte::where('numero_carte', $numero)->exists()); // Vérifie l'unicité du numéro dans la base de données

        return $numero;
    }


    public function showCartes()
    {
        $user = Auth::user();
        $cartes = $user->cartes()->get();

        return view('Client.infoCartes', compact('cartes'));
    }


}
