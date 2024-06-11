<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        TransactionHeader::truncate();
        Schema::enableForeignKeyConstraints();
        
        TransactionHeader::create([
            'users_id' => 1,
            'TransactionDate' => now(),
            'Status' => 'Handled',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
