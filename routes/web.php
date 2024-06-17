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

Route::get('/pokemon/test', [HomepageController::class, 'index'])->name('pokemons.index');
//Page d'accueil
Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');


// pour tout le monde

/*pour l'affichage pokemon et de ses charactéristiques (sans login*)*/
Route::get('/pokemon', [PokemonController::class, 'index'])->name('homepage.pokemons.index');

// Caractéristiques d'un pokemon
Route::get('/pokemons/{id}', [PokemonController::class, 'show'])->name('homepage.pokemons.show');

 /*appelle la methode pour affichage du pokemon selectionné*/
// Création d'un pokemon
Route::get('/pokemon/create', [PokemonController::class, 'create'])->name('pokemons.create');


Route::get('/pokemon/edit', [PokemonController::class, 'edit'])->name('pokemons.edit');


Route::get('/pokemon/destroy', [PokemonController::class, 'destroy'])->name('pokemons.destroy');


/*====================================
=            Back Office             =
====================================*/

// Route pour la page de tableau de bord (dashboard) : Page d'accueil du back office
// Page d'accueil du back office
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//ADMIN/POKEMON: AFFICHER/ CREER / EDITER / CONSERVER /SUPPRIMER
/* aut, que pour les personnes identifiées*/


// Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
//     // Gestion des articles (création, modification, suppression)
//     Route::resource('/pokemons', AdminPokemonController::class)->except(['show']);


// });
// Route::middleware(['auth'])->prefix('admin')->group(function () {
//     Route::get('/pokemons', [AdminPokemonController::class, 'index'])->name('admin.pokemon.index');
//     Route::get('/pokemons/create', [AdminPokemonController::class, 'create'])->name('admin.pokemons.create');
//     Route::post('/pokemons', [AdminPokemonController::class, 'store'])->name('admin.pokemons.store');
//     Route::get('/pokemons/{id}/edit', [AdminPokemonController::class, 'edit'])->name('admin.pokemons.edit');
//     Route::put('/pokemons/{id}', [AdminPokemonController::class, 'update'])->name('admin.pokemons.update');
//     Route::delete('/pokemons/{id}', [AdminPokemonController::class, 'destroy'])->name('admin.pokemons.destroy');
// });


// Groupe de routes nécessitant l'authentification
Route::middleware('auth')->group(function () {
    // Route pour éditer le profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Nomme cette route 'profile.edit'

    // Route pour mettre à jour le profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Nomme cette route 'profile.update'

    // Route pour supprimer le profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Nomme cette route 'profile.destroy'


});

// Inclut les routes d'authentification définies dans 'auth.php'
require __DIR__.'/auth.php';
