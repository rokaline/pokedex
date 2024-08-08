<?php
/*PokemonController*/
namespace App\Http\Controllers;

use App\Http\Requests\PokemonCreateRequest;
use App\Http\Requests\PokemonUpdateRequest;
use App\Models\Attaque;
use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    ///INDEX
    public function index()
    {
        $pokemons = Pokemon::paginate(6);


        return view('pokemon.index', [
            'pokemons' => $pokemons,
        ]);

    }

    ///AFFICHAGE
    public function show($id)
    {
        $pokemon = Pokemon::with(['types', 'attaques.type'])->findOrFail($id);
        return view('pokemon.show', compact('pokemon'));
    }

    ///CREATION
    public function create()
    {
        // Récupérer tous les types depuis la base de données
        $types = Type::all();

        return view('pokemon.create', compact('types'));
    }

    ///ENREGISTREMENT
    public function store(PokemonCreateRequest $request)
    {
        // Création d'une instance de Pokémon avec les données validées
        $pokemon = new Pokemon();
        $pokemon->nom = $request->validated()['nom'];
        $pokemon->pv = $request->validated()['pv'];
        $pokemon->poids = $request->validated()['poids'];
        $pokemon->taille = $request->validated()['taille'];

        // Récupérer et enregistrer l'image du Pokémon
        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('images', 'public');
            $pokemon->img_path = $path;
        }

        // Sauvegarde du Pokémon
        $pokemon->save();

        // Assigner les types au Pokémon
        if ($request->filled('type_obligatoire')) {
            $pokemon->types()->attach($request->input('type_obligatoire'));
        }
        if ($request->filled('type_optionnel')) {
            $pokemon->types()->attach($request->input('type_optionnel'));
        }

        // Redirection vers la liste des Pokémon après création
        return redirect()->route('homepage.pokemons.index');
    }




    ///EDIT
    public function edit(Pokemon $pokemon)
    {
        $types = Type::all();
        $attaques = Attaque::all(); // Ajout de cette ligne pour récupérer toutes les attaques

        return view('pokemon.edit', compact('pokemon', 'types', 'attaques'));
    }

    ///UPDATE: Mise à jour
    public function update(PokemonUpdateRequest $request, Pokemon $pokemon)
    {
        // On modifie les propriétés du pokemon si nécessaire
        $pokemon->nom = $request->validated()['nom'];
        $pokemon->pv = $request->validated()['pv'];
        $pokemon->poids = $request->validated()['poids'];
        $pokemon->taille = $request->validated()['taille'];

        // Récupérer et enregistrer l'image du Pokémon
        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('images', 'public');
            $pokemon->img_path = $path;
        }



        // Assigner les types au Pokémon
        if ($request->filled('type_obligatoire')) {
            $pokemon->types()->attach($request->input('type_obligatoire'));
        }
        if ($request->filled('type_optionnel')) {
            $pokemon->types()->attach($request->input('type_optionnel'));
        }

        // Assigner les attaques au Pokémon
        if ($request->filled('attaque_obligatoire')) {
            $pokemon->types()->attach($request->input('attaque_obligatoire'));
        }
        if ($request->filled('attaque_optionnel')) {
            $pokemon->types()->attach($request->input('attaque_optionnel'));
        }

        // Sauvegarde du Pokémon
        $pokemon->save();

        // Redirection vers la liste des Pokémon après création
        return redirect()->route('homepage.pokemons.index');
    }

    /// DESTRUCTION (Sortie de la DB)
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->back();
    }
}
