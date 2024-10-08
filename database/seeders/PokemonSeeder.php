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
            [ //1
                'nom' => 'Mossblade',
                'img_path' => 'images/mossblade.jpg',
                'pv' => 85,
                'poids' => 45.0,
                'taille' => 1.6,
            ],
            [//2
                'nom' => 'Aerodrake',
                'img_path' => 'images/aerodrake.jpg',
                'pv' => 85,
                'poids' => 47.5,
                'taille' => 1.7,
            ],
            [//3
                'nom' => 'Psychogon',
                'img_path' => 'images/psychogon.jpg',
                'pv' => 83,
                'poids' => 45.8,
                'taille' => 1.6,
            ],
            [//4
                'nom' => 'Venomfang',
                'img_path' => 'images/venomfang.jpg',
                'pv' => 86,
                'poids' => 49.4,
                'taille' => 1.8,
            ],
            [//5
                'nom' => 'Mystiquill',
                'img_path' => 'images/mystiquill.jpg',
                'pv' => 84,
                'poids' => 46.7,
                'taille' => 1.6,
            ],
             [//6
                 'nom' => 'Sylvor',
                 'img_path' => 'images/sylvor.jpg',
                 'pv' => 45,
                 'poids' => 46.7,
                 'taille' => 1.6,
             ],
             [//7
                'nom' => 'Hydroshock',
                'img_path' => 'images/hydroshock.jpg',
                'pv' => 80,
                'poids' => 48.2,
                'taille' => 1.7,
            ],
            [//8
                'nom' => 'Atrodor',
                'img_path' => 'images/aquaflor.jpg',
                'pv' => 80,
                'poids' => 50.0,
                'taille' => 1.5,
            ],
            [//9
                'nom' => 'Vineshroud',
                'img_path' => 'images/vineshroud.jpg',
                'pv' => 75,
                'poids' => 30.0,
                'taille' => 1.2,
            ],
            [//10
                'nom' => 'Florabloom',
                'img_path' => 'images/florabloom.jpg',
                'pv' => 95,
                'poids' => 70.0,
                'taille' => 1.8,
            ],
            [//11
                'nom' => 'Leafstrike',
                'img_path' => 'images/leafstrike.jpg',
                'pv' => 65,
                'poids' => 10.0,
                'taille' => 1.0,
            ],
            [//12
                'nom' => 'Thornleaf',
                'img_path' => 'images/thornleaf.jpg',
                'pv' => 70,
                'poids' => 25.0,
                'taille' => 1.4,
            ],

            [//13
                'nom' => 'Flaregon',
                'img_path' => 'images/flaregon.jpg',
                'pv' => 90,
                'poids' => 55.5,
                'taille' => 1.8,
            ],

            [//14
                'nom' => 'Zaptron',
                'img_path' => 'images/zaptron.jpg',
                'pv' => 88,
                'poids' => 50.3,
                'taille' => 1.6,
            ],
            [//15
                'nom' => 'Frostbite',
                'img_path' => 'images/frostbite.jpg',
                'pv' => 82,
                'poids' => 42.9,
                'taille' => 1.5,
            ],
            [//16
                'nom' => 'Rockscale',
                'img_path' => 'images/rockscale.jpg',
                'pv' => 87,
                'poids' => 60.1,
                'taille' => 1.9,
            ],


        ]);

        $poke = Pokemon::find(1);
        $poke->attaques()->sync([4,3]);
        $poke->types()->sync([1,3]);

        $poke = Pokemon::find(2);
        $poke->attaques()->sync([2,4]);
        $poke->types()->sync([2,4]);

        $poke = Pokemon::find(3);
        $poke->attaques()->sync([3]);
        $poke->types()->sync([2]);

        $poke = Pokemon::find(4);
        $poke->attaques()->sync([4]);
        $poke->types()->sync([4]);

        $poke = Pokemon::find(5);
        $poke->attaques()->sync([2,3]);
        $poke->types()->sync([1,4]);

        $poke = Pokemon::find(6);
        $poke->attaques()->sync([4,3]);
        $poke->types()->sync([4,1]);

        $poke = Pokemon::find(7);
        $poke->attaques()->sync([1]);
        $poke->types()->sync([1]);

        $poke = Pokemon::find(8);
        $poke->attaques()->sync([4]);
        $poke->types()->sync([4]);

        $poke = Pokemon::find(9);
        $poke->attaques()->sync([2,1]);
        $poke->types()->sync([4,3]);

        $poke = Pokemon::find(10);
        $poke->attaques()->sync([1,4]);
        $poke->types()->sync([2,3]);

        $poke = Pokemon::find(11);
        $poke->attaques()->sync([4,1]);
        $poke->types()->sync([4,1]);

        $poke = Pokemon::find(12);
        $poke->attaques()->sync([2,3]);
        $poke->types()->sync([2,3]);

        $poke = Pokemon::find(13);
        $poke->attaques()->sync([4]);
        $poke->types()->sync([2]);

        $poke = Pokemon::find(14);
        $poke->attaques()->sync([3,2]);
        $poke->types()->sync([3,2]);

        $poke = Pokemon::find(15);
        $poke->attaques()->sync([2]);
        $poke->types()->sync([2]);

        $poke = Pokemon::find(16);
        $poke->attaques()->sync([1,2]);
        $poke->types()->sync([4,3]);






        // à garder pour générer des données aléatoires
        // \App\Models\Pokemon::factory(10)->create();
    }
}




