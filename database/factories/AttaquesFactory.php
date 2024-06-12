<?php
/*AttaquesFactory.php*/
namespace Database\Factories;

use App\Models\Attaque;
use App\Models\Type;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attaque>
 */
class AttaquesFactory extends Factory
{
    protected $model = Attaque::class;


    public function definition()
    {


        return [
            'nom' => $this->faker->word,
            'image' => 'images/' . $this->faker->word . '.jpg',
            'dégâts' => $this->faker->numberBetween(10, 150),
            'description' => $this->faker->sentence,
            'type_id' => Type::factory()->create()->id, // Génère automatiquement un type associé
        ];
    }
}
