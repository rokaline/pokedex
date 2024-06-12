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
            [
                'nom' => 'Feu',
                'img_path' => 'tyFeu.jpg',
                'couleur' => 'jaune',
            ],
            [
                'nom' => 'Eau',
                'img_path' => 'tyEau.jpg',
                'couleur' => 'bleu',
            ],
            [
                'nom' => 'Plante',
                'img_path' => 'tyPlante.jpg',
                'couleur' => 'vert',
            ],
            [
                'nom' => 'Electrique',
                'img_path' => 'tyElectrique.jpg',
                'couleur' => 'jaune',
            ],
        ]);


        // à garder pour générer des données aléatoires
        // \App\Models\Types::factory(10)->create();

    }
}
