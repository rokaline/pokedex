<?php


/*HomepageController*/


namespace App\Http\Controllers;

// Importe le modèle Pokemon pour pouvoir l'utiliser dans ce contrôleur
use App\Models\Pokemon;

class HomepageController extends Controller
{
    // Méthode qui sera appelée pour afficher la page d'accueil
    public function index()
    {
        // Récupère tous les Pokémon de la base de données (6 pour l'instant)
        $pokemons = Pokemon::all();

        // Retourne la vue 'homepage.index' et lui passe la variable 'pokemons'
        return view('homepage.index', [
            'pokemons' => $pokemons,
        ]);
    }
}
