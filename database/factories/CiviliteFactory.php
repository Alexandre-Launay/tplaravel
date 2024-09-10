<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Civilite>
 */
class CiviliteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $civilites = ['M', 'Mme', 'Autre'];

        return [
            'titre' => fake()->unique()->randomElement($civilites)
        ];
    }
}
