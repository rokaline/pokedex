<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PokemonController as AdminPokemonController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TypeController;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;


/////////////////////// Routes déjà présentes dans laravel
// Route pour la page d'accueil
// Route::get('/', function () {
//     // Retourne la vue 'welcome'
//     return view('welcome');
// });


//pour debug
Route::get('/pokemon/test', [HomepageController::class, 'index'])->name('pokemons.index');
//Route::get('/pokemon/test', [HomepageController::class, 'index'])->name('pokemons.store');
/*====================================
=            Front Office            =
====================================*/




//Route::get('/pokemon/test', [PokemonController::class, 'index'])->name('pokemons.store');

//Page d'accueil
Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');
/*pour l'affichage pokemon et de ses charactéristiques (sans login*)*/
Route::get('/pokemons/{id}', [PokemonController::class, 'show'])->name('homepage.pokemons.show');


/*====================================
=            Back Office             =
====================================*/

// Route pour la page de tableau de bord (dashboard) : Page d'accueil du back office
// Page d'accueil du back office
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// POKEMON
Route::middleware(['auth'])->group(function () {

    //POKEMON

    Route::get('/pokemon', [PokemonController::class, 'index'])->name('homepage.pokemons.index');

    // Création d'un pokemon
    Route::get('/pokemon/create', [PokemonController::class, 'create'])->name('pokemon.create');

    // Édition d'un pokemon
    Route::get('/pokemon/{pokemon}/edit', [PokemonController::class, 'edit'])->name('pokemons.edit');

    // Suppression d'un pokemon
    Route::delete('/pokemon/{pokemon}/destroy', [PokemonController::class, 'destroy'])->name('pokemons.destroy');

    // Enregistrement d'un nouveau pokemon
    Route::post('/pokemon', [PokemonController::class, 'store'])->name('pokemons.store');

});


//TYPES
// Routes pour les types
Route::middleware(['auth'])->group(function () {
    Route::get('/types', [TypeController::class, 'index'])->name('type.index');
    Route::get('/types/create', [TypeController::class, 'create'])->name('type.create');
    Route::post('/types', [TypeController::class, 'store'])->name('type.store');
    Route::get('/types/{type}/edit', [TypeController::class, 'edit'])->name('type.edit');
    Route::put('/types/{type}', [TypeController::class, 'update'])->name('type.update');
    Route::delete('/types/{type}', [TypeController::class, 'destroy'])->name('type.destroy');
});



//ATTAQUES


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
