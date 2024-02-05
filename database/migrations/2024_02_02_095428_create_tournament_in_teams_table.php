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
        Schema::create('tournament_in_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('t_id');
            $table->foreign('t_id')->references('id')->on('teams');
            $table->unsignedBigInteger('cp_id');
            $table->foreign('cp_id')->references('id')->on('competition_programs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournament_in_teams');
    }
};
