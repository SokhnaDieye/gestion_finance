<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\Pack;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws ValidationException
     */
    // Ajoute la fonction de génération de RIB

    private function genererRibUnique()
    {
        // Générer un nombre aléatoire de 10 chiffres
        $partieAleatoire = mt_rand(1000000000, 9999999999);

        // Obtenir l'ID de l'utilisateur actuellement connecté
        $idUtilisateur = Auth::id();

        // Concaténer la partie aléatoire avec l'ID de l'utilisateur
        $rib = $partieAleatoire . str_pad($idUtilisateur, 2, '0', STR_PAD_LEFT);

        return $rib;
    }

    /**
     * @throws ValidationException
     */
    public function creerCompte(Request $request)
    {
        $user = Auth::user();
        $rib = $this->genererRibUnique();

        // Valider l'unicité du RIB dans la base de données
//        $ribUniqueRule = Rule::unique('comptes', 'rib');
//        $request->validate(
//            [
//                'typeCompte' => 'required',
//                'rib' => $ribUniqueRule,
//                'cin' => 'required|string',
//                'derniereDeduction' => null,
//            ]
//        );

        $fileNameToStore = time(). '.' .$request->photo->extension();
        $request-> photo -> storeAs('public/imageClient',$fileNameToStore);
        // Créer le compte avec les détails nécessaires
        $pack = Pack::find($request->pack_id);
        $compte = new Compte([
            'user_id' => Auth::id(),
            'typeCompte' => request('typeCompte'),
            'rib' => $rib,
            'cin' => request('cin'),
            'photo' => $fileNameToStore,
            'solde' => 0,
            'statut' => 'actif',
            'pack_id' => $pack->id,
        ]);

        $compte->save();

        return redirect()->route('client-infos');
    }


    public function index()
    {
        $packs = Pack::all();
        return view('Client.creerCompte',compact('packs'));
    }
    public function afficherInfo()
    {
        $comptes = Auth::user()->comptes;
        return view('Client.infos',compact('comptes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
