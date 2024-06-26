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
        Schema::create('competition_results', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('score');
            $table->char('tit_id', 10);
            $table->foreign('tit_id')->references('id')->on('tournament_in_teams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_results');
    }
};
