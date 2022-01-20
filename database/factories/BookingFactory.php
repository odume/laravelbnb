<?php

namespace Database\Factories;

use App\Models\Booking;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $from = Carbon::instance($this->faker->dateTimeBetween('-1 months', '+1 months'));
        $to = (clone $from)->addDays(random_int(0, 14));

        return [
            'from' => $from,
            'to' => $to,
        ];
    }

    public function makeStartingFrom(DateTime $from) : Booking
    {
        $to = Carbon::instance(clone $from)->addDays(random_int(0,14));

        return Booking::make([
            'from' => $from,
            'to' => $to,
        ]);
    }
}
