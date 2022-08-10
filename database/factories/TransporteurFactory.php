<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transporteur>
 */
class TransporteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'cin'   =>  $this->faker->randomNumber(8),
            'tel'  => $this->faker->randomNumber(8),
            'zone' => $this->faker->city,
            'matricule'      =>        $this->faker->slug(6),
            'type'           =>        $this->faker->title(8),
            'garntie'        =>        $this->faker->randomNumber(1),
            'montant'        =>        $this->faker->randomNumber(4),
            'rq'             =>        $this->faker->realText(15),
            'contrat'         =>        0,
        ];
    }
}
