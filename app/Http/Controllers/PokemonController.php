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

        $pokemons = Pokemon::paginate(6);
// dd($pokemons);

        return view('pokemon.index', [
            'pokemons' => $pokemons,

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

        // Récupérer et enregistrer l'image du Pokémon
        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('pokemons', 'public');
            $pokemon->img_path = $path;
        }

        // Sauvegarde du Pokémon
        $pokemon->save();

        // Création du type de Pokémon
        $type = new Type();
        $type->nom = $request->validated()['type_nom'];
        $type->couleur = $request->validated()['couleur'];

        // Récupérer et enregistrer l'image du type
        if ($request->hasFile('type_img_path')) {
            $typePath = $request->file('type_img_path')->store('types', 'public');
            $type->img_path = $typePath;
        }

        $type->save();
        $pokemon->types()->attach($type);

        // Création de l'attaque
        $attaque = new Attaque();
        $attaque->nom = $request->validated()['attaque_nom'];
        $attaque->dégâts = $request->validated()['dégâts'];
        $attaque->description = $request->validated()['description'];
        $attaque->type_id = $type->id; // Associer l'attaque au type créé ci-dessus

        // Récupérer et enregistrer l'image de l'attaque
        if ($request->hasFile('attaque_img_path')) {
            $attaquePath = $request->file('attaque_img_path')->store('attaques', 'public');
            $attaque->img_path = $attaquePath;
        }

        $attaque->save();
        $pokemon->attaques()->attach($attaque);

        // Redirection vers la liste des Pokémon après création
        return redirect()->route('homepage.pokemons.index');
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
       $pokemon->image = $request->validated()['image_path'];
       $pokemon->pv = $request->validated()['pv'];
       $pokemon->poids = $request->validated()['poids'];
       $pokemon->taille = $request->validated()['taille'];
       $pokemon->couleur =$request->validated()['type'];
       $pokemon->image = $request->validated()['type_image_path'];
       $pokemon->couleur = $request->validated()['couleur'];
       $pokemon->attaque = $request->validated()['attaque'];
       $pokemon->image = $request->validated()['attaque_image_path'];
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


