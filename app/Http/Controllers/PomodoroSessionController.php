<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PomodoroSession;
use App\Http\Resources\PomodoroSessionResponse;
use App\Http\Requests\StorePomodoroSessionRequest;
use App\Http\Requests\UpdatePomodoroSessionRequest;
use App\Models\PomodoroHistory;

class PomodoroSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PomodoroSession $pomodoroSession)
    {
        return PomodoroSessionResponse::collection($pomodoroSession->getList($request));
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

        return new PomodoroSessionResponse($pomodoroSession->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PomodoroSession $pomodoroSession)
    {
        $sessionId = $pomodoroSession->id;

        if ( $pomodoroSession->delete() ) {
            // Remove any history too.
            PomodoroHistory::where('session_id', $sessionId)->delete();

            return response()->json(200, ['success' => 'Session and any historical sessions have been removed.']);
        }

        return abort(500, 'Unable to remove the session');
    }
}
