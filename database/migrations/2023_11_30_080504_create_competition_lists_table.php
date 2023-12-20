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
        Schema::create('competition_lists', function (Blueprint $table) {
            $table->id();
            $table->string('competition_name', 50);
            $table->date('opening_date');
            $table->date('end_date');
            $table->string('game_name', 50);
            $table->date('start_date');
            $table->date('competition_end_date');
            $table->char('competition_amount', 2);
            $table->text('competition_rule');
            $table->char('competition_type', 1);
            $table->char('cl_round', 1 );
            $table->enum('amount_contestant', ['1', '2', '3', '4', '5']);
            $table->string('cl_img', 50)->nullable();
            $table->char('tm_id', 10);
            $table->enum('status', ['active', 'non active'])->default('non active');
            $table->foreign('tm_id')->references('id')->on('tournament_managers');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_lists');
    }
};
