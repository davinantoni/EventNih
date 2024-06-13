<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventDetail;
use App\Models\EventOrganizer;
use App\Models\EventType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            EventTypeSeeder::class,
            EventOrganizerSeeder::class,
            EventSeeder::class,
            EventDetailSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CartSeeder::class,
            EventCartSeeder::class,
            TransactionHeaderSeeder::class,
            TransactionDetailSeeder::class,       
        ]);
    }
}
