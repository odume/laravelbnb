<?php

namespace Database\Seeders;

use App\Models\Bookable;
use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()
            ->each(function (Bookable $bookable) {
                $booking = Booking::factory()->make();
                $bookings = collect([$booking]);

                for ($i=0; $i < random_int(1,20); $i++) {
                    $from = (clone $booking->to)->addDays(random_int(1,14));
                    $booking = Booking::factory()->makeStartingFrom($from);
                    $bookings->push($booking);
                }

                $bookable->bookings()->saveMany($bookings);
            });
    }

    private function addBookingToBookable(Bookable $bookable)
    {
        #
    }
}
