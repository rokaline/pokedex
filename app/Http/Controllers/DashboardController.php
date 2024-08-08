<?php

namespace App\Http\Controllers;

use App\Models\Attaque;
use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les pokémons avec leurs relations paginées
        $pokemons = Pokemon::with(['types', 'attaques'])->paginate(6);

        // Passer les pokémons à la vue
        return view('dashboard', compact('pokemons'));
    }



}
