<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/////////////////////// Routes déjà présentes dans laravel
// Route pour la page d'accueil
Route::get('/', function () {
    // Retourne la vue 'welcome'
    return view('welcome');
});

// Route pour la page de tableau de bord (dashboard)
Route::get('/dashboard', function () {
    // Retourne la vue 'dashboard'
    return view('dashboard');
})->middleware(['auth', 'verified']) // Applique les middleware 'auth' et 'verified' à cette route
  ->name('dashboard'); // Nomme cette route 'dashboard'

// Groupe de routes nécessitant l'authentification
Route::middleware('auth')->group(function () {
    // Route pour éditer le profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit'); // Nomme cette route 'profile.edit'

    // Route pour mettre à jour le profil
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update'); // Nomme cette route 'profile.update'

    // Route pour supprimer le profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy'); // Nomme cette route 'profile.destroy'
});


//////////////////////////

/*HomePage*/
Route::get('/', [HomepageController::class, 'index']); /* appelle la méthode index de HomepageController. - affichage des 6 pokemons*/



/*Affichage de la liste des pokemon autre que la homepage*/
Route::get('/pokemons', [PokemonController::class, 'index'])->name('pokemons.index');
Route::get('/pokemons/{id}', [PokemonController::class, 'show'])->name('pokemons.show');


// Inclut les routes d'authentification définies dans 'auth.php'
require __DIR__.'/auth.php';
