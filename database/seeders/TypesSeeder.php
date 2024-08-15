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
                'couleur' => 'grey',
            ],

            [#2
                'nom' => 'Eau',
                'img_path' => 'images/eau1.jpg',
                'couleur' => 'blue',
            ],

            [#3
                'nom' => 'Feu',
                'img_path' => 'images/feu1.jpg',
                'couleur' => 'red',
            ],

            [#
                'nom' => 'Terre',
                'img_path' => 'images/terre1.jpg',
                'couleur' => 'brown',
            ],

           
        ]);


        // à garder pour générer des données aléatoires
        // \App\Models\Types::factory(10)->create();

    }
}
