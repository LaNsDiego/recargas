<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventDeport>
 */
class EventDeportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence,
            'fecha_hora_inicio' => $this->faker->dateTime,
            'fecha_hora_termino' => $this->faker->dateTime,
            'cuota' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
