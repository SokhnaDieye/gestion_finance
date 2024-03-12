<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function inscription()
    {
        return view('Accueil.inscription');
    }
    public function doInscription(Request $request)
    {
        $request -> validate(
            [
                'prenom'=>'required',
                'nom'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required'
            ]
        );
        $user = new User();
        $user -> prenom = $request['prenom'];
        $user -> nom = $request['nom'];
        $user -> email = $request['email'];
        $user -> password =Hash::make($request['password']);

        $user -> save();
        return to_route('connexion')->with('success','Inscription reussie');
    }
    public function connexion()
    {
        return view('Accueil.connexion');
    }

    public  function doConnexion(Request $request)
    {
        $credentials = $request->validate(
            [
                'email'=>'required|email',
                'password'=>'required'
            ]
        );
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Vérifier le type d'utilisateur
            if ($user->typeUser == 2) {
                // Rediriger l'utilisateur de type 2 vers une autre page
//                return view('Admin.index');
                return redirect()->route('admin');
            }
            if ($user->typeUser == 3) {
                // Rediriger l'utilisateur de type 2 vers une autre page
                return redirect()->route('guichetier');
            }
            // Vérifier si l'utilisateur a un compte bancaire
            if ($user->comptes->count() > 0) {
                return redirect()->route('client-infos');
            }
            return redirect()->route('pageCreerCompte');

        }
        return back()->with('error','Email ou mot de passe incorrecte');
    }

    public function deconnexion()
    {
        Auth::logout();
        return redirect()->route('connexion');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
