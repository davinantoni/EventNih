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
        Schema::table('transaction_headers', function (Blueprint $table) {
            $table->dropForeign(['carts_id']); 
            $table->dropColumn('carts_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaction_headers', function (Blueprint $table) {
            $table->unsignedBigInteger('carts_id')->required();
            $table->foreign('carts_id')->references('id')->on('carts')->onDelete('restrict');
        });
    }
};
