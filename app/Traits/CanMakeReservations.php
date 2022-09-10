<?php

namespace App\Traits;

use App\Models\Booking;

trait CanMakeReservations
{

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


}
