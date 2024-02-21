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
        //
        Schema::table('competition_results', function (Blueprint $table) {
            $table->char('score_team2', 10);
            $table->renameColumn('score', 'score_team1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('competition_results', function (Blueprint $table) {
            $table->dropColumn('score_team2');
            $table->renameColumn('score_team1', 'score');
        });
    }
};
