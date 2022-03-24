<?php

namespace Tests\Unit;

use App\Models\Pokemon;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

/**
 *
 */
class PokemonTest extends TestCase {

    /**
     * @return void
     */
    public function testRequiredFields() {

        Sanctum::actingAs(User::factory()->create(), ['*']);
        $existingPokemon  = Pokemon::factory()->create();
        $pokemon  = Pokemon::factory()->create();
        $payload = [
            //'identifier' => $existingPokemon->identifier,
        ];
        $this->putJson(route('pokemons.update', $pokemon->id), $payload)
            ->assertStatus(200)
            ->assertJson([
                'status' => false,
                'message' => 'The given data was invalid.',
                'errors' => [
                    'id' => ['The id field is required.']
                ]
            ]);
    }

    /**
     * @return void
     */
    public function testUserUpdatePokemonSuccessfully() {

        Sanctum::actingAs(User::factory()->create(), ['*']);
        $pokemon  = Pokemon::factory()->create();
        $payload = [
            'identifier' => $this->faker->unique()->lastName(),
            'species_id' => $this->faker->randomDigit(),
            'height' => $this->faker->randomDigit(),
            'weight' => $this->faker->randomDigit(),
            'base_experience' => $this->faker->randomDigit(),
            'order' => $this->faker->randomDigit(),
            'is_default' => $this->faker->randomElement([0, 1]),
        ];

        $this->postJson(route('pokemons.update', $pokemon->id), $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'identifier',
                    'species_id',
                    'height',
                    'weight',
                    'base_experience',
                    'order',
                    'is_default',
                ],
            ]);

    }

}
