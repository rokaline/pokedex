<?php
/*AttaquesFactory.php*/
namespace Database\Factories;

use App\Models\Attaques;
use App\Models\Type;
use App\Models\Types;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attaques>
 */
class AttaquesFactory extends Factory
{
    protected $model = Attaques::class;


    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'image' => function () {
                $absolutePath = fake()->image(storage_path('app/public/images'), 640, 480, 'cats', true);

                return str_replace(storage_path('app/public/'), '', $absolutePath);
            },
            'dégâts' => $this->faker->numberBetween(10, 150),
            'description' => $this->faker->sentence,
            'type_id' => Types::factory(), // Génère automatiquement un type associé
        ];
    }
}
