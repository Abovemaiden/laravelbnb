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
}
