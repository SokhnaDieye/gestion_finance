<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public  function  index()
    {

        $listeU=compte::all();
        return view('Admin.index',compact('listeU'));
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
