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
        Schema::create('stream_twitch_api', function (Blueprint $table) {
            $table->char('id',10)->primary();
            $table->string('platform_name', 50);
            $table->string('twitch_client_id', 50);
            $table->string('twitch_client_secret', 50);
            $table->string('twitch_username', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stream_twitch_api');
    }
};
