<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\Recharge;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RechargeTest extends TestCase
{
    use RefreshDatabase;
    /**
     *
     */
    public function test_view_list_of_recharges(): void
    {
        $user = User::factory()->create();
        Recharge::factory(5)->create();
        $response = $this
            ->actingAs($user)
            ->get('/system/recharges')
            ->assertSee('Recargas');

        $recharges = Recharge::all();
        $response->assertOk();
        $response->assertViewIs('recharges.index');
        $response->assertViewHas('recharges',$recharges);
    }
}
