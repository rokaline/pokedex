<?php
/* AttaquesSeeder.php */
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attaque;
use App\Models\Type;

class AttaquesSeeder extends Seeder
{
    public function run()
    {
        Attaque::insert([
            [#1 AIR
                'nom' => 'Souffle-Wizard',
                'img_path' => 'images/atAir.jpg',
                'dégâts' => 85,
                'description' => 'Un souffle puissant rempli d\'énergie . Peut parfois effrayer l\'ennemi et réduire sa défense.',
                'type_id' => Type::where('nom', 'Air')->first()->id,
            ],

            [#2 EAU
                'nom' => 'Cascade-Mystique',
                'img_path' => 'images/atCascade.jpg',
                'dégâts' => 80,
                'description' => 'Une puissante cascade d\'eau qui frappe l\'ennemi. Peut parfois augmenter la défense du lanceur.',
                'type_id' => Type::where('nom', 'Eau')->first()->id,
             ],
            [
                #1
                'nom' => 'Flammes-Eternelles',
                'img_path' => 'images/atFlamme.jpg',
                'dégâts' => 90,
                'description' => 'Un torrent de feu brûlant l\'ennemi avec une intensité inégalée. Peut parfois brûler la cible.',
                'type_id' => Type::where('nom', 'Feu')->first()->id,
            ],

            [#3
                'nom' => 'Crack-Earth',
                'img_path' => 'images/atTerre4.jpg',
                'dégâts' => 70,
                'description' => 'Des lianes vigoureuses fouettent l\'ennemi. Peut parfois paralyser la cible.',
                'type_id' => Type::where('nom', 'Terre')->first()->id,
            ],

            // Ajoutez d'autres attaques ici
        ]);



        // à garder pour générer des données aléatoires
        // \App\Models\Attaques::factory(10)->create();

    }
}
