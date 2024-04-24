<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public  function  index()
    {
        // liste des clients
        $listeU=compte::all();
        // nombres de clients
        $numberOfClients = User::where('typeUser', 1)->count();
        //la somme total d argent dans la banque
        $totalBalance = Compte::whereHas('user', function($query) {
            // Filtrer les comptes qui ont des utilisateurs avec le rôle "client"
            $query->where('typeUser', 1);
        })->sum('solde');
        return view('Admin.index',compact('listeU','numberOfClients','totalBalance'));
    }
    public function desactiver (string $id)
    {
        $userEtat = Compte::find($id);
        $userEtat -> statut = 'bloque';
        $userEtat -> update();
        return back() -> with('success','Votre Utilisateur a été Desactivee avec succés');;
    }
    public function activer (string $id)
    {
        $userEtat = Compte::find($id);
        $userEtat -> statut = 'actif';
        $userEtat -> update();
        return back()-> with('success','Votre Utilisateur a été Activer avec succés');;;
        }

}
