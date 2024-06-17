<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeCreateRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{


    public function index()
    {

        $types = Type::paginate(6);
// dd($pokemons);

        return view('type.index', [
            'types' => $types,

        ]);
    }

    public function create()
    {
        return view('type.create');
    }




    public function store(TypeCreateRequest $request)
    {

        // Création du type de Pokémon
        $type = new Type();
        $type->nom = $request->validated()['nom'];
        $type->couleur = $request->validated()['couleur'];

        // Récupérer et enregistrer l'image du type
        if ($request->hasFile('type_img_path')) {
            $typePath = $request->file('type_img_path')->store('types', 'public');
            $type->img_path = $typePath;
        }

        $type->save();

        // Redirection vers la liste des Pokémon après création
        return redirect()->route('type.index');
    }



    public function destroy(Type $type)
   {
        $type->delete();
        return redirect()->back();
   }

}
