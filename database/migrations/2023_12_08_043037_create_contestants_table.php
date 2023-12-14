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
        Schema::create('contestants', function (Blueprint $table) {
            $table->id();
            $table->string('c_name', 50)->nullable();
            $table->string('c_inGameName', 50)->nullable();
            $table->string('c_email', 50)->nullable();
            $table->char('c_tel', 10)->nullable();
            $table->unsignedBigInteger('t_id');
            $table->foreign('t_id')->references('id')->on('teams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contestants');
    }
};
