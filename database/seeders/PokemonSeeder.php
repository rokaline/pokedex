<?php
/* PokemonSeeder.php */
namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Seeder;



class PokemonSeeder extends Seeder
{
    public function run()
    {
        Pokemon::insert([
            [
                'nom' => 'Mossblade',
                'img_path' => 'images/mossblade.jpg',
                'pv' => 85,
                'poids' => 45.0,
                'taille' => 1.6,
            ],
            [
                'nom' => 'Vineshroud',
                'img_path' => 'images/vineshroud.jpg',
                'pv' => 75,
                'poids' => 30.0,
                'taille' => 1.2,
            ],
            [
                'nom' => 'Florabloom',
                'img_path' => 'images/florabloom.jpg',
                'pv' => 95,
                'poids' => 70.0,
                'taille' => 1.8,
            ],
            [
                'nom' => 'Leafstrike',
                'img_path' => 'images/leafstrike.jpg',
                'pv' => 65,
                'poids' => 10.0,
                'taille' => 1.0,
            ],
            [
                'nom' => 'Thornleaf',
                'img_path' => 'images/thornleaf.jpg',
                'pv' => 70,
                'poids' => 25.0,
                'taille' => 1.4,
            ],
            [
                'nom' => 'Aquaflor',
                'img_path' => 'images/aquaflor.jpg',
                'pv' => 80,
                'poids' => 50.0,
                'taille' => 1.5,
            ],
        ]);

        $poke = Pokemon::find(1);
        $poke->attaques()->sync([1,3]);

        $poke = Pokemon::find(2);
        $poke->attaques()->sync([2,4]);



        // à garder pour générer des données aléatoires
        // \App\Models\Pokemon::factory(10)->create();
    }
}




