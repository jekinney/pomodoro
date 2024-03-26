<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePomodoroSessionRequest;
use App\Models\Pomodoro;
use App\Models\PomodoroSession;
use Illuminate\Http\Request;

class PomodoroSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pomodoro $pomodoro)
    {
        return inertia()->render('Session/Create', [
            'pomodoro' => $pomodoro
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePomodoroSessionRequest $request, PomodoroSession $session)
    {
        $session->create([
            'pomodoro_id' => $request->pomodoro_id,
            'work_time' => $request->work_time,
            'break_time' => $request->break_time,
        ]);

        return redirect()->route('pomodoro.show', $request->pomodoro_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
