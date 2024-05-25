<?php

namespace Database\Seeders;

use App\Models\EventOrganizer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventOrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        EventOrganizer::truncate();
        Schema::enableForeignKeyConstraints();

        EventOrganizer::factory()->count(10)->create();
    }
}
