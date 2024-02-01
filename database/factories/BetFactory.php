<?php

namespace Database\Factories;

use App\Models\EventDeport;
use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bet>
 */
class BetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $event = EventDeport::factory()->create();
        $advisor = User::factory()->create();
        $player = Player::factory()->create();
        return [
            'titulo' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'event_id' => $event->id,
            'advisor_id' => $advisor->id,
            'player_id' => $player->id,
            'cuota' => $this->faker->randomFloat(2, 0, 1000),
            'ganancia' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
