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
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->required();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('restrict');
            // $table->unsignedBigInteger('carts_id')->required();
            // $table->foreign('carts_id')->references('id')->on('carts')->onDelete('restrict');
            $table->date('TransactionDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_headers');
    }
};
