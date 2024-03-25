<?php

namespace Database\Factories;

use App\Models\Pomodoro;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PomodoroSession>
 */
class PomodoroSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'pomodoro_id' => Pomodoro::factory(),
            'loops' => 1,
            'work_time' => 4080, // 8 minute sin seconds
            'break_time' => 240, // 4 minutes
            'start_at' => null,
            'end_at' => null,
        ];
    }
}
