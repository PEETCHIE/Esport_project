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
        Schema::create('competition_programs', function (Blueprint $table) {
            $table->char('id',10)->primary();
            $table->char('round');
            $table->String('matches');
            $table->date('match_date');
            $table->time('match_time');
            $table->char('cl_id',10);
            $table->foreign('cl_id')->references('id')->on('competition_lists');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_programs');
    }
};
