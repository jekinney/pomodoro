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
            'user_id' => $request->user()->id,
            'work_time' => $request->work_time,
            'break_time' => $request->break_time,
            'pomodoro_id' => $request->pomodoro_id,
            'display_name' => $request->display_name,
        ]);

        return redirect()->route('pomodoro.show', $session->pomodoro_id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id, PomodoroSession $session)
    {
        return inertia()->render('Session/Show', [
            'session' => $session->with('user', 'pomodoro')->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PomodoroSession $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PomodoroSession $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PomodoroSession $session)
    {
        //
    }
}
