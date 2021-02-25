<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory, Uuids;

    protected $fillable = ['from', 'to'];

    public function bookables()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function scopeBetweenDates($query, $from, $to)
    {
        return $query->where('to', '>', $from)
            ->where('from', '<', $to);
    }
}
