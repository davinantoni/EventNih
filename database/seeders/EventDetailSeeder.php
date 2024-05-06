<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        EventDetail::truncate();
        Schema::enableForeignKeyConstraints();

        // EventDetail::factory()->count(10)->create();
        $events = Event::all();
        
        foreach ($events as $event){
            EventDetail::factory()->create([
                'event_id' => $event->id
            ]);
        }
    }
}
