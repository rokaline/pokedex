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
                'nom' => 'EauMystique',
                'img_path' => 'images/atCascade.jpg',
                'dégâts' => 40,
                'description' => 'Une puissante cascade eau magique la défense du lanceur.',
                'type_id' => Type::where('nom', 'Eau')->first()->id,
             ],

            [
                #3Feu
                'nom' => 'Feu Eternel',
                'img_path' => 'images/atFlamme.jpg',
                'dégâts' => 90,
                'description' => 'Un torche de feu.',
                'type_id' => Type::where('nom', 'Feu')->first()->id,
            ],
           

            [#4 Terre
                'nom' => 'Terre Ecrasante',
                'img_path' => 'images/atTerre1.jpg',
                'dégâts' => 90,
                'description' => 'Boule de Terre.',
                'type_id' => Type::where('nom', 'Terre')->first()->id,
            ],


            // Ajoutez d'autres attaques ici
        ]);



        // à garder pour générer des données aléatoires
        // \App\Models\Attaques::factory(10)->create();

    }
}
