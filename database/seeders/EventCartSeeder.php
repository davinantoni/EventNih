<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Event;
use App\Models\EventCart;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventCart::truncate();

        // EventCart::insert([
        //     ['carts_id' => 1, 'events_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['carts_id' => 2, 'events_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['carts_id' => 3, 'events_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     // Tambahkan data lain sesuai kebutuhan
        // ]);
        $carts = Cart::all();
        foreach ($carts as $cart) {
            // Attach setiap event ke cart jika belum terdapat dalam cart
            $events_id = $cart->events_id;

            $cart->events()->attach($events_id);
        }
    }
}
