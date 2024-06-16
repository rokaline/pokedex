<?php
/*PokemonController*/

namespace App\Http\Controllers;


use App\Models\Pokemon;
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



}


