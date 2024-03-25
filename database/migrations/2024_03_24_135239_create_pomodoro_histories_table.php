<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pomodoro_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('User who started the session');
            $table->foreignId('pomodoro_id')->constrained();
            $table->unsignedInteger('loops')->comment('How many times the session should repeat on a loop');
            $table->unsignedInteger('completed_loops')->comment('How many times the session actually looped');
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pomodoro_histories');
    }
};
