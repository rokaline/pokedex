<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PokemonCreateRequest;
use App\Http\Requests\PokemonUpdateRequest;
use App\Models\Attaque;
use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemons = Pokemon::with('types', 'attaques')->paginate(10);
        return view('admin.pokemons.index', compact('pokemons'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $attaques = Attaque::all();
        return view('admin.pokemons.create', compact('types', 'attaques'));
    }

    /**
     * Store a newly created resource in storage.
     */public function store(PokemonCreateRequest $request)
    {
        // Création d'une instance de Pokémon avec les données validées
        $pokemon = new Pokemon();
        $pokemon->nom = $request->validated()['nom'];
        $pokemon->pv = $request->validated()['pv'];
        $pokemon->poids = $request->validated()['poids'];
        $pokemon->taille = $request->validated()['taille'];
        $pokemon->couleur = $request->validated()['couleur'];
        $pokemon->attaque = $request->validated()['attaque'];
        $pokemon->dégâts = $request->validated()['dégâts'];
        $pokemon->description = $request->validated()['description'];

        // Récupérer et enregistrer l'image si elle est présente dans la requête
        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('pokemons', 'public');
            $pokemon->img_path = $path;
        }

        // Sauvegarder le Pokémon en base de données
        $pokemon->save();

        // Redirection vers la liste des Pokémon après création
        return redirect()->route('admin.pokemons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('admin.pokemons.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        $types = Type::all();
        $attaques = Attaque::all();
        return view('admin.pokemons.edit', compact('pokemon', 'types', 'attaques'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PokemonUpdateRequest $request, Pokemon $pokemon)
    {
        // On modifie les propriétés du pokemon
        $pokemon->nom = $request->validated()['nom'];
        $pokemon->pv = $request->validated()['pv'];
        $pokemon->poids = $request->validated()['poids'];
        $pokemon->taille = $request->validated()['taille'];
        $pokemon->couleur =$request->validated()['type'];
        $pokemon->couleur = $request->validated()['couleur'];
        $pokemon->attaque = $request->validated()['attaque'];
        $pokemon->dégâts =$request->validated()['dégâts'];
        $pokemon->description = $request->validated()['description'];


        // Si il y a une image, on la sauvegarde
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('pokemons', 'public');
            $pokemon->img_path = $path;
        }

        // On sauvegarde les modifications en base de données
        $pokemon->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->back();
    }
}
