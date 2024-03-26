<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * Eager load count of relationships
     *
     * @var array
     */
    protected $withCount = ['sessions', 'history'];

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
     * Relationship to the Pomodoro History model
     *
     * @return HasMany
     */
    public function history(): HasMany
    {
        return $this->hasMany(PomodoroHistory::class, 'pomodoro_id', 'id');
    }

    /**
     * Relationship to the Pomodoro Session model
     *
     * @return HasMany
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(PomodoroSession::class, 'pomodoro_id', 'id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:m-d-Y',
        ];
    }
}
