<?php
/*PokemonController*/

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller{
    public function index()
    {

        $pokemons = Pokemon::paginate(6);

        return view('pokemon.index', [
            'pokemons' => $pokemons,
        ]);
    }

    public function show($id)
    {
// dd($id);
        $pokemon = Pokemon::with(['types', 'attaques.type'])->findOrFail($id);

        return view('pokemon.show', compact('pokemon'));
    }


    // public function show($id)
    // {
    //     $pokemon = Pokemon::with(['types', 'attaques'])->findOrFail($id);

    //     return view('pokemon.show', [
    //         'pokemon' => $pokemon,
    //     ]);
    // }

}


