<?php

namespace App\Http\Controllers;

use App\Models\Pomodoro;
use Illuminate\Http\Request;
use App\Http\Requests\StorePomodoroRequest;
use App\Http\Requests\UpdatePomodoroRequest;
use App\Http\Resources\PomodoroResponse;

class PomodoroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Pomodoro $pomodoro)
    {
        return PomodoroResponse::collection($pomodoro->listOfAll($request));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePomodoroRequest $request, Pomodoro $pomodoro)
    {
        $pom = $pomodoro->create([
            'user_id' => $request->user()->id,
            'team_id' => $request->team_id?? null,
            'description' => $request->description,
            'display_name' => $request->display_name,
        ]);

        return new PomodoroResponse($pom);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pomodoro $pomodoro)
    {
        return new PomodoroResponse($pomodoro);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pomodoro $pomodoro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePomodoroRequest $request, Pomodoro $pomodoro)
    {
        $pomodoro->update([
            'description' => $request->description,
            'display_name' => $request->display_name,
        ]);

        return new PomodoroResponse($pomodoro->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pomodoro $pomodoro)
    {
        $pomodoro->history()->delete();
        $pomodoro->sessions()->delete();

        if ( $pomodoro->delete() ) {
            return response()->json(['success' => 'Pomodoro has been removed']);
        }
        return abort(500, 'Unable to remove Pomodoro');
    }
}
