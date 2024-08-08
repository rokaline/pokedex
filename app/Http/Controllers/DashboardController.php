<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les pokémons paginés
        $pokemons = Pokemon::paginate(6);

        // Passer les pokémons à la vue pour affichage
        return view('dashboard', compact('pokemons'));
    }
}
