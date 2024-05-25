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
        Schema::create('event_details', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->required();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('restrict');
            $table->string('Description', 255)->required();
            $table->time('Start_time');
            $table->time('End_time');
            $table->integer('Seat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_details');
    }
};
