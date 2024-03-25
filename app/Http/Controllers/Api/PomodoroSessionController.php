<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PomodoroHistory;
use App\Models\PomodoroSession;
use App\Http\Controllers\Controller;
use App\Http\Resources\PomodoroSessionResponse;
use App\Http\Requests\StorePomodoroSessionRequest;
use App\Http\Requests\UpdatePomodoroSessionRequest;
use App\Http\Resources\PomodoroSessionStartResponse;

class PomodoroSessionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(PomodoroHistory $pomodoroHistory)
    {
        //
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
    public function store(StorePomodoroSessionRequest $request, PomodoroSession $session)
    {
        $session = $session->create([
            'user_id' => $request->user()->id,
            'work_time' => $request->work_time,
            'break_time' => $request->break_time,
            'pomodoro_id' => $request->pomodoro_id,
        ]);

        return new PomodoroSessionResponse($session);
    }

    /**
     * Display the specified resource.
     */
    public function show(PomodoroSession $pomodoroSession)
    {
        dd( $pomodoroSession->load('pomodoro', 'history') );
        return new PomodoroSessionResponse($pomodoroSession);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PomodoroSession $pomodoroSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePomodoroSessionRequest $request, PomodoroSession $pomodoroSession)
    {
        $pomodoroSession->update([
            'work_time' => $request->work_time,
            'break_time' => $request->break_time,
        ]);

        return new PomodoroSessionResponse($pomodoroSession->fresh()->load('pomodoro', 'history'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PomodoroSession $pomodoroSession)
    {
        // Remove relationship(s)
        $pomodoroSession->history()->delete();

        if ( $pomodoroSession->delete() ) {
            return response()->json(200, ['success' => 'Session and any historical sessions have been removed.']);
        }

        return abort(500, 'Unable to remove the session');
    }

    /**
     * Trigger a start of a session
     *
     * @param Request $request
     * @param PomodoroSession $pomodoroSession
     * @return void
     */
    public function start(Request $request, PomodoroSession $pomodoroSession)
    {
        $history = $pomodoroSession->history()->create([
            'user_id' => $request->user()->id,
            'pomodoro_id' => $pomodoroSession->pomodoro_id,
            'loops' => $pomodoroSession->loops,
            'start_at' => Carbon::now(),
        ]);

        return new PomodoroSessionStartResponse($history->load('pomodoro', 'session'));
    }
}
