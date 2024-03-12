<?php

use App\Http\Controllers\CompteController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Accueil.index');
});


Route::group(['middleware' => 'auth'], function () {
    //pack
    Route::get('/pack', [\App\Http\Controllers\PackController::class, 'index'])->name('pack');
    Route::post('/ajoutPack', [\App\Http\Controllers\PackController::class, 'store'])->name('ajout-pack');
    //Guichetier
    Route::post('/ajoutGuichetier', [\App\Http\Controllers\PackController::class, 'store'])->name('ajout-guichetier');
    Route::get('/guichetier', [\App\Http\Controllers\GuichetierController::class, 'index'])->name('guichetier');
    Route::post('/faire-depot',[\App\Http\Controllers\GuichetierController::class,'faireDepot'])->name('faire-depot');

    //Route Admin
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/Admin/index',[\App\Http\Controllers\AdminController::class,'listeUser'])->name('listeUser');
    //Etat route
    Route::put('admin/desactiver/{id}',[\App\Http\Controllers\AdminController::class,'desactiver'])->name('desactiver');
    Route::put('admin/activer/{id}',[\App\Http\Controllers\AdminController::class,'activer'])->name('activer');

    //client
    Route::get('/creer-compte', [CompteController::class, 'index'])->name('pageCreerCompte');
    Route::post('/creer-compte', [CompteController::class, 'creerCompte'])->name('creer-compte');
    Route::get('/client-infos', [CompteController::class, 'afficherInfo'])->name('client-infos');
// Route pour effectuer une transaction
    Route::post('/faire-transaction/{id}', [TransactionController::class, 'faireTransaction'])
        ->name('faire-transaction');




    Route::delete('/deconnexion', [\App\Http\Controllers\AuthController::class, 'deconnexion'])->name('deconnexion');

});

// Authentification
Route::group(['middleware' => 'guest'], function () {

    Route::get('/inscription', [\App\Http\Controllers\AuthController::class, 'inscription'])->name('inscription');
    Route::post('/inscription', [\App\Http\Controllers\AuthController::class, 'doInscription'])->name('inscription');
    Route::get('/connexion', [\App\Http\Controllers\AuthController::class, 'connexion'])->name('connexion');
    Route::post('/connexion', [\App\Http\Controllers\AuthController::class, 'doConnexion'])->name('connexion');
});

//deconnection
Route::post('logout', [\App\Http\Controllers\AuthController::class, 'destroy'])
    ->name('logout');
