<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingByReviewResource;
use App\Models\Bookings;
use Illuminate\Http\Request;

class BookingsByReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($reviewKey, Request $request)
    {
        $booking = Bookings::findByReviewKey($reviewKey);
        return $booking ? new BookingByReviewResource($booking) : abort(404);
    }
}
