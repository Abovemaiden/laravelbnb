<?php

namespace Database\Seeders;

use App\Models\Bookable;
use App\Models\Bookings;
use Illuminate\Database\Seeder;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()->each(function (Bookable $bookable) {
            $booking = Bookings::factory()->make();
            $bookings = collect([$booking]);

            for ($i = 0; $i < random_int(1, 5); $i++) {
                $from = (clone $booking->to)->addDays(random_int(1, 14));
                $to = (clone $from)->addDays(random_int(0, 14));

                $booking = Bookings::make([
                    'from' => $from,
                    'to' => $to,
                ]);
                $bookings->push($booking);
            }

            $bookable->bookings()->saveMany($bookings);
        });
    }
}
