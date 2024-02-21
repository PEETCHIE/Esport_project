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
        Schema::table('competition_results', function($table) {
            $table->char('score_team1', 10)->change(); 
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('competition_results', function($table) {
            $table->string('score_team1')->change();
        });
    }
};
