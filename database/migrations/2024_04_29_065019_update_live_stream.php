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
        Schema::table('stream_twitch_api', function ($table) {
            $table->char('tm_id', 10);
            $table->foreign('tm_id')->references('id')->on('tournament_managers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('stream_twitch_api', function ($table) {
            $table->char('tm_id', 10);
        });
    }
};
