<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_events', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id')->required();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('events_id')->required();
            $table->foreign('events_id')->references('id')->on('events')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_events');
    }
};
