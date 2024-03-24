<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PomodoroController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/v1')->middleware('auth:sanctum')->group( function() {
    Route::get('/user', function (Request $request) {return $request->user();});

    // Pomodoro Model
    Route::get('/pomodoro', [PomodoroController::class, 'index']);
    Route::get('/pomodoro/{pomodoro}', [PomodoroController::class, 'show']);
    Route::post('/pomodoro', [PomodoroController::class, 'store']);
    Route::patch('/pomodoro/{pomodoro}', [PomodoroController::class, 'update']);
    Route::delete('/pomodoro/{pomodoro}', [PomodoroController::class, 'destroy']);
});
