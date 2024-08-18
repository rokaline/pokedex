<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttaqueCreateRequest;
use App\Http\Requests\AttaqueUpdateRequest;
use App\Models\Attaque;
use App\Models\Type;
use Illuminate\Http\Request;

class AttaqueController extends Controller
{
    public function index()
    {
        $attaques = Attaque::paginate(6);
        return view('attaque.index', [
            'attaques' => $attaques,
        ]);
    }

    public function create()
    {
        $types = Type::all(); // Récupérer les types pour les utiliser dans le formulaire
        return view('attaque.create', compact('types'));
    }

    public function store(AttaqueCreateRequest $request)
    {
        // Création d'une instance d'Attaque avec les données validées
        $attaque = new Attaque();
        $attaque->nom = $request->validated()['nom'];
        $attaque->dégâts = $request->validated()['dégâts'];
        $attaque->description = $request->validated()['description'];
        $attaque->type_id = $request->validated()['type_id']; // Assurez-vous que cette valeur est fournie par la requête

        // Récupérer et enregistrer l'image de l'attaque
        if ($request->hasFile('attaque_img_path')) {
            $path = $request->file('attaque_img_path')->store('images', 'public');
            $attaque->img_path = $path;
        }

        // Sauvegarde de l'attaque
        $attaque->save();

        // Redirection vers la liste des attaques après création
        return redirect()->route('attaque.index');
    }

    public function edit(Attaque $attaque)
    {
        $types = Type::all();
        return view('attaque.edit', compact('attaque', 'types'));
    }

    public function update(AttaqueUpdateRequest $request, Attaque $attaque)
    {
        $attaque->nom = $request->validated()['nom'];
        $attaque->dégâts = $request->validated()['dégâts'];
        $attaque->description = $request->validated()['description'];
        $attaque->type_id = $request->validated()['type_id'];

        if ($request->hasFile('attaque_img_path')) {
            $path = $request->file('attaque_img_path')->store('images', 'public');
            $attaque->img_path = $path;
        }

        $attaque->save();

        return redirect()->route('attaque.index');
    }

    // public function destroy(Attaque $attaque)
    // {
    //     // supression attaque de bdd
    //     $attaque->delete();

    //     // redirection vers la page précédente
    //     return redirect()->route('attaque.index');
    // }

    public function destroy(Attaque $attaque)
{
    // recuperation des pokemon et deleur attaque
    $pokemons = $attaque->pokemons;


    $attaque->delete();

    // Vérifier les Pokémon et leur nombre d'attaques restantes après suppression de l'attaque
    foreach ($pokemons as $pokemon) {
        // Recharger les données du Pokémon pour vérifier les attaques restantes
        $pokemon->load('attaques');

        // Si le Pokémon n'a plus d'attaques après la suppression de cette attaque, le supprimer
        if ($pokemon->attaques->count() == 0) {
            $pokemon->delete();
        }
    }

    // Rediriger vers la liste des attaques
    return redirect()->back();
}

}
