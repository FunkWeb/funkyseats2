<?php

namespace App\Traits;

use App\Models\Booking;
use App\Models\Resource;

trait CanMakeReservations
{

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getCurrentReservationAttribute()
    {

    }

    public function bookResource(Resource $resource, $date)
    {

    }

    public function releaseResource(Resource $resource)
    {

    }

}
