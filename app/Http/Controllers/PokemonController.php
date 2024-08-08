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
        $types = [];
        if ($request->filled('type_obligatoire')) {
            $types[] = $request->input('type_obligatoire');
        }
        if ($request->filled('type_optionnel')) {
            $types[] = $request->input('type_optionnel');
        }
        $pokemon->types()->sync($types);

        // Redirection vers la liste des Pokémon après création
        return redirect()->route('homepage.pokemons.index');
    }




    ///EDIT
    public function edit(Pokemon $pokemon)
    {
        $types = Type::all();
        return view('pokemon.edit', compact('pokemon', 'types'));
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
            $path = $request->file('img_path')->store('images', 'public');
            $pokemon->img_path = $path;
        }

        // Sauvegarde du Pokémon
        $pokemon->save();

        // Assigner les types au Pokémon
        $types = [];
        if ($request->filled('type_obligatoire')) {
            $types[] = $request->input('type_obligatoire');
        }
        if ($request->filled('type_optionnel')) {
            $types[] = $request->input('type_optionnel');
        }
        $pokemon->types()->sync($types);
        return redirect()->route('homepage.pokemons.index');
    }

    /// DESTRUCTION (Sortie de la DB)
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->back();
    }
}
