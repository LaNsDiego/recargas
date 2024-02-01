<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => $this->faker->unique()->randomNumber(8),
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'saldo' => $this->faker->randomFloat(2, 0, 1000),

        ];
    }
}
