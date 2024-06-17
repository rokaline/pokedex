<?php
/*PokemonController*/

namespace App\Http\Controllers;

use App\Http\Requests\PokemonCreateRequest;
use App\Http\Requests\PokemonUpdateRequest;
use App\Models\Attaque;
use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;

class PokemonController extends Controller{
    public function index()
    {

        $pokemon = Pokemon::paginate(6);

        return view('pokemon.index', [
            'pokemons' => $pokemon,
        ]);
    }


    /*pour affichage du pokemon et ses caracteristiques*/
    public function show($id)
    {
//dd($id);
        $pokemon = Pokemon::with(['types', 'attaques.type'])->findOrFail($id);

        return view('pokemon.show', compact('pokemon'));
    }


    public function create()
    {
        return view('pokemon.create');
    }


 public function store(PokemonCreateRequest $request)
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


