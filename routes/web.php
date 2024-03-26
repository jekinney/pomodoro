<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PomodoroController;
use App\Http\Controllers\PomodoroHistoryController;
use App\Http\Controllers\PomodoroSessionController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session')])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/pomodoro', [PomodoroController::class, 'index'])->name('pomodoro.index');
    Route::get('/pomodoro/create', [PomodoroController::class, 'create'])->name('pomodoro.create');
    Route::get('/pomodoro/show/{pomodoro}', [PomodoroController::class, 'show'])->name('pomodoro.show');
    Route::get('/pomodoro/edit/{pomodoro}', [PomodoroController::class, 'edit'])->name('pomodoro.edit');
    Route::post('/pomodoro', [PomodoroController::class, 'store'])->name('pomodoro.store');
    Route::patch('/pomodoro/{pomodoro}', [PomodoroController::class, 'update'])->name('pomodoro.update');
    Route::delete('/pomodoro/{pomodoro}', [PomodoroController::class, 'destroy'])->name('pomodoro.destroy');

    Route::get('/session', [PomodoroSessionController::class, 'index'])->name('session.index');
    Route::get('/session/create/{pomodoro}', [PomodoroSessionController::class, 'create'])->name('session.create');
    Route::get('/session/show/{id}', [PomodoroSessionController::class, 'show'])->name('session.show');
    Route::get('/session/edit/{pomodoro_session}', [PomodoroSessionController::class, 'edit'])->name('session.edit');
    Route::post('/session', [PomodoroSessionController::class, 'store'])->name('session.store');
    Route::post('/session/start/{session}', [PomodoroSessionController::class, 'start'])->name('session.start');
    Route::post('/session/end/{session}', [PomodoroSessionController::class, 'end'])->name('session.end');
    Route::patch('/session/{pomodoro}', [PomodoroSessionController::class, 'update'])->name('session.update');
    Route::delete('/session/{pomodoro}', [PomodoroSessionController::class, 'destroy'])->name('session.destroy');

    Route::get('/history/show/{pomodoroHistory}', [PomodoroHistoryController::class, 'show'])->name('history.show');
    Route::delete('/history/{pomodoroHistory}', [PomodoroHistoryController::class, 'destroy'])->name('history.destroy');
});
