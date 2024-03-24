<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePomodoroHistoryRequest;
use App\Http\Requests\UpdatePomodoroHistoryRequest;
use App\Models\PomodoroHistory;

class PomodoroHistoryController extends Controller
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
    public function store(StorePomodoroHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PomodoroHistory $pomodoroHistory)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PomodoroHistory $pomodoroHistory)
    {
        //
    }
}
