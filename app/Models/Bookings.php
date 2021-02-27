<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to'];

    public function bookables()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function scopeBetweenDates(Builder $query, $from, $to)
    {
        return $query->where('to', '>', $from)
            ->where('from', '<', $to);
    }

    public static function findByReviewKey(string $reviewKey)
    {
        // return static::where('review_key', $reviewKey)->with('bookables')->get()->first();
        return Bookings::where('bookable_id', $reviewKey)->with('bookables')->get()->first();
    }

    public static function findBookingsWithBookables()
    {
        return Bookings::with('bookables')->get();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            if (empty($booking->{$booking->getKeyName()})) {
                $booking->{$booking->getKeyName()} = Str::uuid()->toString();
            }
            $booking->review_key = Str::uuid();
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
