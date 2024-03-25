<?php

use App\Http\Controllers\PomodoroController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

    Route::get('pomodoro', [PomodoroController::class, 'index'])->name('pomodoro.index');
    Route::get('pomodoro/create', [PomodoroController::class, 'create'])->name('pomodoro.create');
    Route::get('pomodoro/show/{pomodoro}', [PomodoroController::class, 'show'])->name('pomodoro.show');
    Route::get('pomodoro/edit/{pomodoro}', [PomodoroController::class, 'edit'])->name('pomodoro.edit');
    Route::post('/pomodoro', [PomodoroController::class, 'store'])->name('pomodoro.store');
    Route::patch('/pomodoro/{pomodoro}', [PomodoroController::class, 'update'])->name('pomodoro.update');
    Route::delete('/pomodoro/{pomodoro}', [PomodoroController::class, 'destroy'])->name('pomodoro.destroy');
});
