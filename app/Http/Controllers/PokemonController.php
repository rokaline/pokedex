<?php
/*PokemonController*/namespace App\Http\Controllers;

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
        return view('pokemon.create');
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
            $path = $request->file('img_path')->store('pokemon', 'public');
            $pokemon->img_path = $path;
        }

        // Sauvegarde du Pokémon
        $pokemon->save();

        // Redirection vers la liste des Pokémon après création
        return redirect()->route('homepage.pokemons.index');
    }

    ///EDIT
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    ///UPDATE: Mise à jour
    public function update(PokemonUpdateRequest $request, Pokemon $pokemon)
    {
        // On modifie les propriétés du pokemon
        $pokemon->nom = $request->validated()['nom'];
        $pokemon->pv = $request->validated()['pv'];
        $pokemon->poids = $request->validated()['poids'];
        $pokemon->taille = $request->validated()['taille'];

        // Récupérer et enregistrer l'image du Pokémon
        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('pokemon', 'public');
            $pokemon->img_path = $path;
        }

        // Sauvegarde du Pokémon
        $pokemon->save();

        return redirect()->route('homepage.pokemons.index');
    }

    /// DESTRUCTION (Sortie de la DB)
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->back();
    }
}
