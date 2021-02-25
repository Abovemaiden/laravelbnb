<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, Uuids;

    public function bookable()
    {
        $this->belongsTo(Bookable::class);
    }

    public function bookings()
    {
        $this->belongsTo(Bookings::class);
    }
}
