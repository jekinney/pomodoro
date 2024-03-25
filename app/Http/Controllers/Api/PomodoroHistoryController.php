<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PomodoroHistory;
use App\Http\Controllers\Controller;
use App\Http\Resources\PomodoroHistoryResponse;
use App\Http\Requests\StorePomodoroHistoryRequest;
use App\Http\Requests\UpdatePomodoroHistoryRequest;

class PomodoroHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PomodoroHistory $pomodoroHistory)
    {
        return PomodoroHistoryResponse::collection($pomodoroHistory->getList($request));
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
    public function store(StorePomodoroHistoryRequest $request, PomodoroHistory $pomodoroHistory)
    {
        $history = $pomodoroHistory->create([
            'session_id' => $request->session_id,
            'pomodoro_id' => $request->pomodoro_id,
            'iteration' => $request->iteration,
            'started_at' => $request->started_at? Carbon::parse($request->started_at):Carbon::now(),
        ]);

        return new PomodoroHistoryResponse($history);
    }

    /**
     * Display the specified resource.
     */
    public function show(PomodoroHistory $pomodoroHistory)
    {
        return new PomodoroHistoryResponse($pomodoroHistory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PomodoroHistory $pomodoroHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePomodoroHistoryRequest $request, PomodoroHistory $pomodoroHistory)
    {
        $pomodoroHistory->create([
            'ended_at' => $request->ended_at? Carbon::parse($request->ended_at):Carbon::now(),
        ]);

        return new PomodoroHistoryResponse($pomodoroHistory->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PomodoroHistory $pomodoroHistory)
    {
        if ( $pomodoroHistory->delete() ) {
            return response()->json(200, 'History has been removed');
        }

        return abort(500, 'Unable to remove the historical session');
    }
}
