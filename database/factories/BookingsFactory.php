<?php

namespace Database\Factories;

use App\Models\Bookings;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bookings::class;

    // protected $from = Carbon::now()->toDate();
    // protected $to = Carbon::now()->toDate();
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
}
