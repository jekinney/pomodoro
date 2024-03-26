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
        Schema::create('pomodoro_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('User who created the session');
            $table->foreignId('pomodoro_id')->constrained();
            $table->string('display_name');
            $table->unsignedInteger('loops')->default(1)->comment('How many times the session should repeat on a loop');
            $table->unsignedBigInteger('work_time');
            $table->unsignedBigInteger('break_time');
            $table->timestamp('start_at')->nullable()->comment('Allows an auto start if using web sockets to push');
            $table->timestamp('end_at')->nullable()->comment('Allows an end time for auto starting.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pomodoro_sessions');
    }
};
