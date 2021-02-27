<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'id',
        'rating',
        'content'
    ];

    public function bookable()
    {
        $this->belongsTo(Bookable::class, 'bookable_id');
    }

    public function bookings()
    {
        $this->belongsTo(Bookings::class, 'booking_id');
    }
}
