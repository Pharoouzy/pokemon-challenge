<?php

namespace Database\Factories;

use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pokemon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'identifier' => $this->faker->unique()->lastName(),
            'species_id' => $this->faker->randomDigit(),
            'height' => $this->faker->randomDigit(),
            'weight' => $this->faker->randomDigit(),
            'base_experience' => $this->faker->randomDigit(),
            'order' => $this->faker->randomDigit(),
            'is_default' => $this->faker->randomElement([0, 1]),
        ];
    }
}
