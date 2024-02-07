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
        Schema::create('teams', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('t_name', 50);
            $table->string('logo', 200)->nullable();
            $table->date('t_date');
            $table->char('cl_id',10);
            $table->foreign('cl_id')->references('id')->on('competition_lists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
