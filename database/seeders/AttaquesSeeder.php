<?php
/* AttaquesSeeder.php */
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attaques;
use App\Models\Types;

class AttaquesSeeder extends Seeder
{
    public function run()
    {
        Attaques::insert([
            [
                'nom' => 'Flammes Éternelles',
                'image' => 'atFlamme.jpg',
                'dégâts' => 90,
                'description' => 'Un torrent de feu brûlant l\'ennemi avec une intensité inégalée. Peut parfois brûler la cible.',
                'type_id' => Types::where('nom', 'Feu')->first()->id,
            ],
            [
                'nom' => 'Cascade Mystique',
                'image' => 'atCascade.jpg',
                'dégâts' => 80,
                'description' => 'Une puissante cascade d\'eau qui frappe l\'ennemi. Peut parfois augmenter la défense du lanceur.',
                'type_id' => Types::where('nom', 'Eau')->first()->id,
            ],
            [
                'nom' => 'Fouet-Liane',
                'image' => 'atFouet.jpg',
                'dégâts' => 70,
                'description' => 'Des lianes vigoureuses fouettent l\'ennemi. Peut parfois paralyser la cible.',
                'type_id' => Types::where('nom', 'Plante')->first()->id,
            ],
            [
                'nom' => 'Souffle Electrique',
                'image' => 'atSouffle.jpg',
                'dégâts' => 85,
                'description' => 'Un souffle puissant rempli d\'énergie électrique. Peut parfois effrayer l\'ennemi et réduire sa défense.',
                'type_id' => Types::where('nom', 'Electrique')->first()->id,
            ],
            // Ajoutez d'autres attaques ici
        ]);



        // à garder pour générer des données aléatoires
        // \App\Models\Attaques::factory(10)->create();

    }
}
