<?php

namespace App\Models;

use LDAP\Result;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StorePomodoroRequest;
use App\Http\Requests\UpdatePomodoroRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pomodoro extends Model
{
    use HasFactory;

    /**
     * Guarded columns form mass assignment
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Relationship to User model.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Relationship to Team model.
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(PomodoroSession::class, 'pomodoro_id', 'id');
    }

    public function history(): HasMany
    {
        return $this->hasMany(PomodoroSession::class, 'pomodoro_id', 'id');
    }

    /**
     * List of a auth user's personal
     * and associated teams pomodoros
     *
     * @param Request $request
     * @return void
     */
    public function listOfAll(Request $request): Collection
    {
        // With the request object you could do sorting and searching as needed.
        $user = $request->user()->load('teams');

        return $this->load('sessions')
        ->where('user_id', $user->id)
        ->orWhereIn('team_id', $user->teams->select('id')->all())
        ->get();
    }
}
