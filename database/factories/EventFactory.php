<?php

namespace Database\Factories;

use App\Models\EventType;
use App\Models\EventOrganizer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types_id = EventType::pluck('id')->toArray();
        $organizers_id = EventOrganizer::pluck('id')->toArray();
        $titles = [
            'Saturday Party',
            'Trading Session',
            'Business Webinar',
            'New Year Celebration',
        ];

        $locations = [
            'Aruba Hall',
            'Gelora Bung Karno',
            'Istana Muara',
            'Jakarta International Stadium',
        ];

        $cities = [
            'DKI Jakarta',
            'Bandung',
        ];

        $photo = [
            'Event1.png',
            'Event2.png',
            'Event3.png',
            'Event4.png',
            'Event5.png',
        ];      
        $faker = faker::create();

        return [
            'eventType_id' => $faker->randomElement($types_id),
            'organizer_id' => $faker->randomElement($organizers_id),
            'Title' => $faker->randomElement($titles),
            'Date' => $faker->dateTimeBetween('2024-05-06', '2024-12-31'),           
            'Location' => $faker->randomElement($locations),
            'City' => $faker->randomElement($cities),
            'Price' => $faker->randomFloat(2, 10000, 1000000),
            'Photo' => $faker->randomElement($photo)
        ];
    }
}
