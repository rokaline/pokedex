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


    ///INDEX
    public function index()
    {

        $pokemons = Pokemon::paginate(6);
// dd($pokemons);

        return view('pokemon.index', [
            'pokemons' => $pokemons,

        ]);
    }





    ///AFFICHAGE
    public function show($id)
    {
//dd($id);
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

    dd($request->all());

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
    return redirect()->route('pokemon.index');


}



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

       // Si il y a une image, on la sauvegarde
       if ($request->hasFile('image')) {
           $path = $request->file('image')->store('pokemon', 'public');
           $pokemon->img_path = $path;
       }

       // On sauvegarde les modifications en base de données
       $pokemon->save();

       return redirect()->back();
   }



   /// DESTRUCTION (Sortie de la DB)
   public function destroy(Pokemon $pokemon)
   {
       $pokemon->delete();
       return redirect()->back();
   }


}


