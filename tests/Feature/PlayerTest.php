<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_view_dashboard(): void
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->get('/dashboard')
            ->assertSee('Dashboard');

        $response->assertStatus(200);
    }

    public function test_view_list_of_player(): void
    {
        $user = User::factory()->create();
        Player::factory(5)->create();
        $response = $this
            ->actingAs($user)
            ->get('/system/players')
            ->assertSee('Jugadores');

        $players = Player::all();
        $response->assertOk();
        $response->assertViewIs('players.index');
        $response->assertViewHas('players',$players);
    }
}
