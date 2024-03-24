<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePomodoroSessionRequest;
use App\Http\Requests\UpdatePomodoroSessionRequest;
use App\Models\PomodoroSession;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePomodoroSessionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PomodoroSession $pomodoroSession)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PomodoroSession $pomodoroSession)
    {
        //
    }
}
