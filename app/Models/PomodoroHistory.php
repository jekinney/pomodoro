<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PomodoroHistory extends Model
{
    use HasFactory;

    /**
     * Guarded columns form mass assignment
     *
     * @var array
     */
    protected $guarded = ['id'];

}
