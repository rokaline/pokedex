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
        // Mise à jour des informations de base du Pokémon
        // $pokemon->nom = $request->input('nom');
        // $pokemon->pv = $request->input('pv');
        // $pokemon->poids = $request->input('poids');
        // $pokemon->taille = $request->input('taille');


        $pokemon->nom = $request->validated('')['nom'];
        $pokemon->pv = $request->validated('')['pv'];
        $pokemon->poids = $request->validated('')['poids'];
        $pokemon->taille = $request->validated('')['taille'];


        // Gestion de l'image du Pokémon
        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('images/newPokemon', 'public');
            $pokemon->img_path = $path;
        }

        // Mise à jour du type obligatoire du Pokémon
        if ($request->filled('type_obligatoire')) {
            // Détacher tous les types existants
            $pokemon->types()->detach();

            // Récupérer et associer le type obligatoire
            $typeObligatoire = Type::find($request->input('type_obligatoire'));
            if ($typeObligatoire) {
                $pokemon->types()->attach($typeObligatoire->id);
            }
        }

        // Mise à jour de l'attaque obligatoire du Pokémon
        if ($request->filled('attaque_obligatoire')) {
            // Détacher toutes les attaques existantes
            $pokemon->attaques()->detach();

            // Récupérer et associer l'attaque obligatoire
            $attaqueObligatoire = Attaque::find($request->input('attaque_obligatoire'));
            if ($attaqueObligatoire) {
                $pokemon->attaques()->attach($attaqueObligatoire->id);
            }
        }

        // OPTIONS Pokémon
        // TYPE Option
        if ($request->filled('type_optionnel')) {
            // Récupérer le type optionnel
            $typeOptionnel = Type::find($request->input('type_optionnel'));
            if ($typeOptionnel) {
                // Vérifier si le type optionnel est déjà associé
                if (!$pokemon->types->contains($typeOptionnel->id)) {
                    $pokemon->types()->attach($typeOptionnel->id);
                }
            }
        }

        // Attaque Option
        if ($request->filled('attaque_optionnelle')) {
            // Récupérer l'attaque optionnelle
            $attaqueOptionnelle = Attaque::find($request->input('attaque_optionnelle'));
            if ($attaqueOptionnelle) {
                // Vérifier si l'attaque optionnelle est déjà associée
                if (!$pokemon->attaques->contains($attaqueOptionnelle->id)) {
                    $pokemon->attaques()->attach($attaqueOptionnelle->id);
                }
            }
        }

        // Sauvegarde des modifications du Pokémon
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
