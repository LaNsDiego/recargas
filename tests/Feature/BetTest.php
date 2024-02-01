<?php

namespace Tests\Feature;

use App\Models\Bet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BetTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_view_list_of_bet(): void
    {
        $user = User::factory()->create();
        Bet::factory(5)->create();
        $response = $this
            ->actingAs($user)
            ->get('/system/bets')
            ->assertSee('Apuestas');

        $bets = Bet::all();
        $response->assertOk();
        $response->assertViewIs('bets.index');
        $response->assertViewHas('bets',$bets);
    }
}
