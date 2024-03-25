<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PomodoroHistory extends Model
{
    use HasFactory;

    /**
     * Guarded columns form mass assignment
     *
     * @var array
     */
    protected $guarded = ['id'];

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
     * Relationship to the Pomodoro Session model
     *
     * @return BelongsTo
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(PomodoroSession::class, 'session_id', 'id');
    }

}
