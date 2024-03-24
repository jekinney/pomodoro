<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Team;
use App\Models\User;
use App\Models\Pomodoro;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PomodoroTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testing a user can get a list of owned pomodoros with out a team.
     */
    public function test_a_user_can_get_a_list_of_their_pomodoros_by_user(): void
    {
        // Set up data
        $user = User::factory()->create();
         Pomodoro::factory(10)->create([
            'team_id' => null,
            'user_id' => $user->id
        ]);

        $this->actingAs($user)->getJson('/api/v1/pomodoro')
        ->assertStatus(200)
        ->assertJsonCount(10);
    }

     /**
     * A basic feature test example.
     */
    public function test_a_user_can_get_a_list_of_their_pomodoros_by_team(): void
    {
        // Set up data
        $user = User::factory()->create();
        $team = Team::factory()->create(['user_id' => $user->id]);

        $user->teams()->attach($team);

        Pomodoro::factory(10)->create([
            'team_id' => $team->id,
            'user_id' => $user->id
        ]);

        $this->actingAs($user)->getJson('/api/v1/pomodoro')
        ->assertStatus(200)
        ->assertJsonCount(10);
    }

    /**
     * A basic feature test example.
     */
    public function test_a_user_can_get_a_list_of_their_pomodoros_all(): void
    {
        // Set up data
        $user = User::factory()->create();
        $team = Team::factory()->create(['user_id' => $user->id]);

        $user->teams()->attach($team);

        Pomodoro::factory(10)->create([
            'team_id' => $team->id,
            'user_id' => $user->id
        ]);

        Pomodoro::factory(10)->create([
            'team_id' => null,
            'user_id' => $user->id
        ]);

        $this->actingAs($user)->getJson('/api/v1/pomodoro')
        ->assertStatus(200)
        ->assertJsonCount(20);
    }

    /**
     * A basic feature test example.
     */
    public function test_a_user_can_create_a_pomodoro(): void
    {
        // Set up data
        $user = User::factory()->create();
        $team = Team::factory()->create(['user_id' => $user->id]);

        $user->teams()->attach($team);

        $this->actingAs($user)->postJson('/api/v1/pomodoro', [
            'display_name' => 'test',
            'description' => 'Test Description'
        ])->assertStatus(201);

        $this->assertDatabaseHas('pomodoros', [
            'display_name' => 'test',
            'description' => 'Test Description'
        ]);
    }

    /**
     * A basic feature test example.
     */
    public function test_a_user_can_update_a_pomodoro(): void
    {
        // Set up data
        $user = User::factory()->create();
        $team = Team::factory()->create(['user_id' => $user->id]);

        $user->teams()->attach($team);

        $pom = Pomodoro::factory()->create([
            'team_id' => $team->id,
            'user_id' => $user->id,
            'display_name' => 'created',
            'description' => 'created description'
        ]);

        $this->actingAs($user)->patchJson('/api/v1/pomodoro/'.$pom->id, [
            'display_name' => 'test',
            'description' => 'Test Description'
        ])->assertStatus(200);

        $this->assertDatabaseHas('pomodoros', [
            'display_name' => 'test',
            'description' => 'Test Description'
        ]);
    }

    /**
     * A basic feature test example.
     */
    public function test_a_user_can_remove_a_pomodoro(): void
    {
        // Set up data
        $user = User::factory()->create();
        $team = Team::factory()->create(['user_id' => $user->id]);

        $user->teams()->attach($team);

        $pom = Pomodoro::factory()->create([
            'team_id' => $team->id,
            'user_id' => $user->id,
        ]);

        $this->actingAs($user)->deleteJson('/api/v1/pomodoro/'.$pom->id)
        ->assertStatus(200);

        $this->assertDatabaseCount('pomodoros', 0);
    }
}
