<?php
/*PokemonFactory.php*/
namespace Database\Factories;

use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{

    protected $model = Pokemon::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'pv' => $this->faker->numberBetween(10, 100),
            'poids' => $this->faker->randomFloat(2, 0.1, 100), // Poids entre 0.1 et 100 kg
            'taille' => $this->faker->randomFloat(2, 0.1, 10), // Taille entre 0.1 et 10 mètres
        ];
    }
}
