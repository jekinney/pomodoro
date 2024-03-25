<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PomodoroController;
use App\Http\Controllers\Api\PomodoroHistoryController;
use App\Http\Controllers\Api\PomodoroSessionController;

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

    // Pomodoro Sessions
    Route::get('/session/{pomodoroSession}', [PomodoroSessionController::class, 'show']);
    Route::get('/session/start/{pomodoroSession}', [PomodoroSessionController::class, 'start']);
    Route::patch('/session/end/{pomodoroSession}', [PomodoroSessionController::class, 'end']);
    Route::post('/session', [PomodoroSessionController::class, 'store']);
    Route::patch('/session/{pomodoroSession}', [PomodoroSessionController::class, 'update']);
    Route::delete('/session/{pomodoroSession}', [PomodoroSessionController::class, 'destroy']);

    // Pomodoro History
    Route::get('/history/{pomodoroHistory}', [PomodoroHistoryController::class, 'show']);
    Route::delete('/history/{pomodoroHistory}', [PomodoroHistoryController::class, 'destroy']);
});
