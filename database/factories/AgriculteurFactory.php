<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agriculteur>
 */
class AgriculteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom_prenom' => $this->faker->name(),
            'cin'   =>  $this->faker->randomNumber(8),
            'tel'  => $this->faker->randomNumber(8),
            'zone' => $this->faker->city,
            'region'  => $this->faker->country,
        ];
    }
}
