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

    public function index(Request $request)
    {
        // Récupérer tous les types et attaques disponibles pour les champs de sélection
        $types = Type::all();
        $attaques = Attaque::all();

        // Filtre par lettre de Pokemon
        $pokemons = Pokemon::where('nom', 'LIKE', $request->search.'%');

        // Filtre pour le type
        if ($request->filled('type')) {
            $pokemons->whereHas('types', function ($query) use ($request) {
                $query->where('types.id', $request->type);
            });
        }

        // Filtre pour l'attaque
        if ($request->filled('attaque')) {
            $pokemons->whereHas('attaques', function ($query) use ($request) {
                $query->where('attaques.id', $request->attaque);
            });
        }

        // Exécuter la requête et paginer les résultats
        $pokemons = $pokemons->orderBy('id')->paginate(6);


        // Retourner la vue avec les résultats
        return view('homepage.index', [
             'pokemons' => $pokemons,
             'types' => $types,
             'attaques' => $attaques,
         ]);

    }

}
