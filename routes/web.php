<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PokemonController as AdminPokemonController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


/////////////////////// Routes déjà présentes dans laravel
// Route pour la page d'accueil
// Route::get('/', function () {
//     // Retourne la vue 'welcome'
//     return view('welcome');
// });


/*====================================
=            Front Office            =
====================================*/


//Page d'accueil
Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');


/*pour l'affichage pokemon et de ses charactéristiques (sans login*/
Route::get('/pokemons', [PokemonController::class, 'index'])->name('homepage.pokemons.index');
// Caractéristiques d'un pokemon
Route::get('/pokemons/{id}', [PokemonController::class, 'show'])->name('homepage.pokemons.show');
 /*appelle la methode pour affichage du pokemon selectionné*/



// Route pour la page de tableau de bord (dashboard) : Page d'accueil du back office
Route::get('/dashboard', function () {
    // Retourne la vue 'dashboard'
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); // (pointe vers)'

// Groupe de routes nécessitant l'authentification
Route::middleware('auth')->group(function () {
    // Route pour éditer le profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Nomme cette route 'profile.edit'

    // Route pour mettre à jour le profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Nomme cette route 'profile.update'

    // Route pour supprimer le profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Nomme cette route 'profile.destroy'


});



/* Admin des pokemon*/

// Routes protégées par l'authentification
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('pokemons', AdminPokemonController::class);
});

// Route pour afficher le formulaire d'administration des Pokémons
Route::get('/admin/pokemons', [AdminPokemonController::class, 'create'])->name('admin.pokemons.create');

// // Route pour gérer la soumission du formulaire
Route::post('/admin/pokemons', [AdminPokemonController::class, 'store'])->name('admin.pokemons.store');






// Inclut les routes d'authentification définies dans 'auth.php'
require __DIR__.'/auth.php';
