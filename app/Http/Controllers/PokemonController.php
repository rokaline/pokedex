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


 public function index()//SANS  Filtre
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
        // Récupérer tous les types disponibles pour les champs de sélection
        $types = Type::all();

        // Récupérer toutes les attaques disponibles pour les champs de sélection
        $attaques = Attaque::all();

        // Récupérer les types associés au Pokémon
        $typeObligatoire = $pokemon->types->first();
        $typeOptionnel = $pokemon->types->count() > 1 ? $pokemon->types->get(1) : null;

        // Récupérer les attaques associées au Pokémon
        $attaqueObligatoire = $pokemon->attaques->first();
        $attaqueOptionnelle = $pokemon->attaques->count() > 1 ? $pokemon->attaques->get(1) : null;

        // Passer toutes les données nécessaires à la vue Blade
        return view('pokemon.edit', compact('pokemon', 'types', 'attaques'));
    }



    ///UPDATE: Mise à jour du pokemon et de ses caractéristiques
    public function update(PokemonUpdateRequest $request, Pokemon $pokemon)
    {
        // méthode validated() pour récupérer les données validées
        $validatedData = $request->validated();

        // maj du pokemon
        $pokemon->nom = $validatedData['nom'];
        $pokemon->pv = $validatedData['pv'];
        $pokemon->poids = $validatedData['poids'];
        $pokemon->taille = $validatedData['taille'];

        // image pokemon
        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('images/pokemon', 'public');
            $pokemon->img_path = $path;
        }



        // type obligatoire
        if ($request->filled('type_obligatoire')) {
            $pokemon->types()->sync([$validatedData['type_obligatoire']]);
        }

        // attaque obligatoire
        if ($request->filled('attaque_obligatoire')) {
            $pokemon->attaques()->sync([$validatedData['attaque_obligatoire']]);
        }

        // type optionnel
        if ($request->filled('type_optionnel')) {
            // On attache sans détacher, car c'est un type optionnel.
            $pokemon->types()->attach($validatedData['type_optionnel']);
        }

        // attaque optionnelle
        if ($request->filled('attaque_optionnelle')) {
            // On attache sans détacher, car c'est une attaque optionnelle.
            $pokemon->attaques()->attach($validatedData['attaque_optionnelle']);
        }


        // Sauvegarde du pokemon ds BDD utilisant la méthode save()
        $pokemon->save();

        // Redirection vers la liste des Pokémon après modification
        return redirect()->route('homepage.pokemons.index');
    }


        /// DESTRUCTION (Sortie de la DB)
        public function destroy(Pokemon $pokemon)
        {
            $pokemon->delete();
            return redirect()->back();
        }
}
