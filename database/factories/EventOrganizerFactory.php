<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventOrganizer>
 */
class EventOrganizerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = faker::create();
        $emails = [
            'test1@gmail.com',
            'test2@gmail.com',
            'test3@gmail.com',
            'test4@gmail.com',
            'test5@gmail.com'
        ];
        $phoneNumebers = [
            '02155314332',
            '02155314432',
            '02155354544',
            '02154353453',
            '02156578954'
        ];

        return [
            'OrganizerName' => $faker->name(),
            'OrganizerEmail' => $faker->randomElement($emails),
            'OrganizerPhoneNumber' => $faker->randomElement($phoneNumebers)
        ];
    }
}
