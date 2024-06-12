<?php
/* TypesFactory.php */

namespace Database\Factories;
use App\Models\Type;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'nom' => $this->faker->word,
            'image' => 'images/' . $this->faker->word . '.jpg',
            'couleur' => $this->faker->safeColorName,
        ];
    }
}
