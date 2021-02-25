<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookable extends Model
{
    use HasFactory, Uuids;

    protected $fillable = ['title', 'description'];

    public function bookings()
    {
        return $this->hasMany(Bookings::class);
    }
}
