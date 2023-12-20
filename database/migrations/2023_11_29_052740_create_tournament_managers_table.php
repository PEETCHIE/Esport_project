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
        Schema::create('tournament_managers', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('coordinator_name', 50);
            $table->string('organization_name', 50);
            $table->text('organization_detail');
            $table->text('coordinator_detail'); 
            $table->date('date');
            $table->string('email', 50);
            $table->boolean('permission')->default(false);
            $table->char('tel', 10);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournament_managers');
    }
};
