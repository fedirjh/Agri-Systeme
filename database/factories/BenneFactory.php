<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Benne>
 */
class BenneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nbenne' => $this->faker->randomNumber(5),
            'long'   =>  $this->faker->numberBetween(0,99),
            'larg'  => $this->faker->numberBetween(0,99),
            'haut' => $this->faker->numberBetween(0,99),
            'req'             =>        $this->faker->realText(15),
        ];
    }
}
