<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\EventType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        EventType::truncate();
        Schema::enableForeignKeyConstraints();

        $types = [
            ['Type_name' => 'Event'],
            ['Type_name' => 'Festival'],
            ['Type_name' => 'Tour'],
            ['Type_name' => 'Attraction']
        ];
        foreach ($types as $value){ 
            EventType::insert([
                'Type_name' => $value['Type_name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
