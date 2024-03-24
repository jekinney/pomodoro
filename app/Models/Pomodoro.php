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

    /**
     * Update an existing resource
     *
     * @param  UpdatePomodoroRequest $request
     * @return Model
     */
    public function renew(UpdatePomodoroRequest $request): Model
    {
        $this->update([
            'description' => $request->description,
            'display_name' => $request->display_name,
        ]);

        return $this->fresh();
    }

    /**
     * Attempt to remove a resource
     *
     * @return void
     */
    public function remove()
    {
        if ( $this->has('sessions') ) return abort(422, 'Pomodoro has sessions still attached');
        if ( $this->delete() ) {
            return true;
        }
        abort(500, 'Unable to remove Pomodoro');
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

        return $this->where('user_id', $user->id)
        ->orWhereIn('team_id', $user->teams->select('id')->all())
        ->get();
    }
}
