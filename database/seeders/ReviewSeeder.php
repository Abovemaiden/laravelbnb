<?php

namespace Database\Seeders;

use App\Models\Bookable;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()->each(function (Bookable $bookable) {
            $reviews = Review::factory()->count(random_int(1, 3))->make();

            $bookable->reviews()->saveMany($reviews);
        });
    }
}
