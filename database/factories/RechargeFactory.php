<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recharge>
 */
class RechargeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $player = Player::factory()->create();
        return [
            'red_social' => $this->faker->word,
            'codigo_voucher' => $this->faker->word,
            'monto_voucher' => $this->faker->randomFloat(2, 0, 1000),
            'fecha_hora_voucher' => $this->faker->dateTime(),
            'banco_voucher' => $this->faker->word,
            'player_id' => $player->id,
            'imagen_voucher' => $this->faker->word,
        ];
    }
}
