<?php

namespace Tests\Feature;

use App\Models\EventDeport;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventDeportTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_view_list_of_event(): void
    {
        $user = User::factory()->create();
        EventDeport::factory(5)->create();
        $response = $this
            ->actingAs($user)
            ->get('/system/events')
            ->assertSee('Eventos');

        $events = EventDeport::all();
        $response->assertOk();
        $response->assertViewIs('events.index');
        $response->assertViewHas('events',$events);
    }
}
