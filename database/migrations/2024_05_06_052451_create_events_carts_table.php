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
        Schema::create('events_carts', function (Blueprint $table) {
            $table->unsignedBigInteger('events_id')->required();
            $table->foreign('events_id')->references('id')->on('events')->onDelete('restrict');
            $table->unsignedBigInteger('carts_id')->required();
            $table->foreign('carts_id')->references('id')->on('carts')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_carts');
    }
};
