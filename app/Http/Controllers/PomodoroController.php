<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePomodoroRequest;
use App\Models\Pomodoro;
use Illuminate\Http\Request;

class PomodoroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Pomodoro $pomodoro)
    {
        $user = $request->user()->load('teams');

        $list = $pomodoro->withCount('sessions', 'history')
        ->where('user_id', $user->id)
        ->orWhereIn('team_id', $user->teams->select('id')->all())
        ->get();

        return inertia()->render('Pomodoro/Index', [
            'pomodoros' => $list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia()->render('Pomodoro/Create', [
            'teams' => auth()->user()->teams,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePomodoroRequest $request, Pomodoro $pomodoro)
    {
        $pomodoro = $pomodoro->create([
            'user_id' => $request->user()->id,
            'team_id' => $request->team_id?? null,
            'description' => $request->description,
            'display_name' => $request->display_name,
        ]);

        return redirect()->route('pomodoro.show', $pomodoro);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pomodoro $pomodoro)
    {
        return inertia()->render('Pomodoro/Show', [
            'pomodoro' => $pomodoro->load('sessions')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pomodoro $pomodoro)
    {
        return inertia()->render('Pomodoro/Edit', [
            'pomodoro' => $pomodoro
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pomodoro $pomodoro)
    {
        $pomodoro->update([
            'description' => $request->description,
            'display_name' => $request->display_name,
        ]);

        return redirect()->route('pomodoro.show', $pomodoro->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pomodoro $pomodoro)
    {
        $pomodoro->history()->delete();
        $pomodoro->sessions()->delete();
        $pomodoro->delete();

        return redirect()->route('pomodoro.index');
    }
}
