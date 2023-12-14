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
            $table->string('agency', 50);
            $table->string('agency_tel', 10);
            $table->string('agency_email', 30);
            $table->string('manager_name', 50);
            $table->string('manager_email', 30);
            $table->string('manager_tel', 10);
            $table->string('coordinator_name', 50);
            $table->string('coordinator_tel', 10);
            $table->string('coordinator_email', 30);
            $table->string('coordinator_line', 30);
            $table->date('tm_date')->useCurrent();
            $table->text('coordinator_address');
            $table->boolean('permission')->default(false);
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
