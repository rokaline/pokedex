<?php


/*HomepageController*/


namespace App\Http\Controllers;

use App\Models\Attaque;
use Illuminate\Http\Request;
// Importe le modèle Pokemon pour pouvoir l'utiliser dans ce contrôleur
use App\Models\Pokemon;
use App\Models\Type;

class HomepageController extends Controller
{
    // Méthode qui sera appelée pour afficher la page d'accueil
    public function index(Request $request) 
    {
        // Récupérer tous les types et attaques disponibles pour les champs de sélection
        $types = Type::all();
        $attaques = Attaque::all();

        // Commencer la requête pour les Pokémon
        $query = Pokemon::query();

        // Filtre pr Pokemon
        if ($request->filled('search')) {
            $query->where('nom', 'LIKE', '%'.$request->query('search').'%');
        }

        // Filtre pr Type
        if ($request->filled('type')) {
            $query->whereHas('types', function ($query) use ($request) {
                $query->where('types.id', $request->query('type'));
            });
        }

        // Filtre pr Attaque
        if ($request->filled('attaque')) {
            $query->whereHas('attaques', function ($query) use ($request) {
                $query->where('attaques.id', $request->query('attaque'));
            });
        }

        // Affichage résultats
        $pokemons = $query->orderByDesc('created_at')->paginate(6);



        return view('homepage.index', [

            'pokemons' => $pokemons,
            'types' => $types,
            'attaques' => $attaques,
        ]);
    }


}
