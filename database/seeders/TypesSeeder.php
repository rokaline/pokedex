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
        Type::insert([
            [   #1
                'nom' => 'Air',
                'img_path' => 'images/air1.jpg',
                'couleur' => 'Bleu',
            ],

            [#2
                'nom' => 'Eau',
                'img_path' => 'images/eau4.jpg',
                'couleur' => 'Blanc',
            ],

            [#3
                'nom' => 'Feu',
                'img_path' => 'images/feu2.jpg',
                'couleur' => 'Rouge',
            ],

            [#
                'nom' => 'Terre',
                'img_path' => 'images/terre4.jpg',
                'couleur' => 'Ocre',
            ],
        ]);


        // à garder pour générer des données aléatoires
        // \App\Models\Types::factory(10)->create();

    }
}
