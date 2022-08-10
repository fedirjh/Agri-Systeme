<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responsable>
 */
class ResponsableFactory extends Factory
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
            'email' => $this->faker->email,
        ];
    }
}
