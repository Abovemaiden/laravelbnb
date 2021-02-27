<?php

use App\Http\Controllers\Api\BookableAvailabilityController;
use App\Http\Controllers\Api\BookableController;
use App\Http\Controllers\Api\BookableReviewController;
use App\Http\Controllers\Api\BookingsByReviewController;
use App\Http\Controllers\Api\BookingsController;
use App\Http\Controllers\Api\BookingsWithBookablesController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Bookables API
Route::apiResource('bookables', BookableController::class);
Route::get('bookables/{bookable}/availability', BookableAvailabilityController::class);
Route::get('bookables/{bookable}/reviews', BookableReviewController::class);

// Bookings API
Route::apiResource('bookings', BookingsController::class);
Route::get('bookings-by-review/{reviewKey}', BookingsByReviewController::class);
Route::get('bookingstest', BookingsWithBookablesController::class);

// Reviews API
Route::apiResource('reviews', ReviewController::class);
