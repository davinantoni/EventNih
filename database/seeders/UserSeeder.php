<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        $admins = ['davin', 'richard', 'alvin', 'alfredo', 'james'];
        foreach ($admins as $index => $admin) {
            User::insert([
                'role_id' => '1',
                'name' => $admin, 
                'email' => $admin . '@gmail.com',
                'password' => Hash::make('123'), 
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        User::factory()->count(10)->create();
    }
}
