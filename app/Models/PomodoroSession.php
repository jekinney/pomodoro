<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PomodoroSession extends Model
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
    protected $withCount = ['history'];

    /**
     * Relationship to the User model
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to the Pomodoro model
     *
     * @return BelongsTo
     */
    public function pomodoro(): BelongsTo
    {
        return $this->belongsTo(Pomodoro::class);
    }

    /**
     * Relationship to the Pomodoro History model
     *
     * @return HasMany
     */
    public function history(): HasMany
    {
        return $this->hasMany(PomodoroHistory::class, 'session_id', 'id');
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
