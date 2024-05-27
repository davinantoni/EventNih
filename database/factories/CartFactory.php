<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users_id = User::pluck('id')->toArray();
        $events_id = Event::pluck('id')->toArray();
        $faker = faker::create();
        return [
            // 'id' => 1,
            'users_id' => 1,
            'events_id' => $faker->randomElement($events_id),
            'quantity' => $faker->numberBetween(1, 3)   
        ];
    }
}
