<?php
/*TypesSeeder.php*/
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Types;

class TypesSeeder extends Seeder
{
    public function run()
    {
        Types::insert([
            [
                'nom' => 'Feu',
                'image' => 'tyFeu.jpg',
                'couleur' => 'jaune',
            ],
            [
                'nom' => 'Eau',
                'image' => 'tyEau.jpg',
                'couleur' => 'bleu',
            ],
            [
                'nom' => 'Plante',
                'image' => 'tyPlante.jpg',
                'couleur' => 'vert',
            ],
            [
                'nom' => 'Electrique',
                'image' => 'tyElectrique.jpg',
                'couleur' => 'jaune',
            ],
        ]);


        // à garder pour générer des données aléatoires
        // \App\Models\Types::factory(10)->create();

    }
}
