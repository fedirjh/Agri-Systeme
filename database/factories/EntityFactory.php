<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entity>
 */
class EntityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $random = $this->faker->randomNumber(4);
        return [
            'ref' => $this->faker->unique()->word(),
            'category' => $this->faker->word(),
            'quantityTotal' => $random,
            'quantityUsed'  => 0,
            'remarque' => $this->faker->text(10)
        ];
    }
}
