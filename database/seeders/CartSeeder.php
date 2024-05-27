<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Cart::truncate();
        Schema::enableForeignKeyConstraints();

        Cart::factory()->count(3)->create();
    }
}
