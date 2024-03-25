<?php

namespace Tests\Feature;

use App\Models\Pomodoro;
use App\Models\PomodoroSession;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PomodoroSessionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test a user can see a session.
     */
    public function test_a_user_can_get_a_session_data(): void
    {
        $user = User::factory()->create();
        $pomodoro = Pomodoro::factory()->create([
            'user_id' => $user->id,
        ]);
        $session = PomodoroSession::factory()->create([
            'user_id' => $user->id,
            'pomodoro_id' => $pomodoro->id,
        ]);

        $this->actingAs($user)
        ->getJson("/api/v1/session/{$session->id}")
        ->assertStatus(200)
        ->assertJsonCount(1);
    }

    // /**
    //  * Test a user can create a session.
    //  */
    // public function test_a_user_can_create_a_session(): void
    // {
    //     $pomodoro = Pomodoro::factory()->create();

    //     $response = $this->postJson('/api/v1/session', [

    //     ])->assertStatus(200);
    // }

    // /**
    //  * Test a user can create a session.
    //  */
    // public function test_a_user_can_update_a_session(): void
    // {
    //     $pomodoro = Pomodoro::factory()->create();

    //     $response = $this->postJson('/api/v1/session', [

    //     ])->assertStatus(200);
    // }

    // /**
    //  * Test a user can create a session.
    //  */
    // public function test_a_user_can_start_a_session(): void
    // {
    //     $pomodoro = Pomodoro::factory()->create();

    //     $response = $this->postJson('/api/v1/session', [

    //     ])->assertStatus(200);
    // }

    // /**
    //  * Test a user can create a session.
    //  */
    // public function test_a_user_can_end_a_session(): void
    // {
    //     $pomodoro = Pomodoro::factory()->create();

    //     $response = $this->postJson('/api/v1/session', [

    //     ])->assertStatus(200);
    // }
}
