<?php

namespace Database\Factories;

use DateInterval;
use App\Models\Event;
use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventDetail>
 */
class EventDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = faker::create();
        // $duration = $faker->numberBetween(60, 240);
        $startTime = $faker->dateTimeBetween('08:00:00', '20:00:00');
        $duration = new DateInterval('PT' . $faker->numberBetween(60, 240) . 'M');
        $endTime = $startTime->add($duration);

        return [
            'Description' => $faker->paragraph(3,false),
            'Start_time' => $faker->time('H:i'),
            'End_time' => $faker->time('H:i'),
            'Seat' => $faker->numberBetween(10, 500),
        ];
    }
}
