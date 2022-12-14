<?php

namespace App\Traits;

use App\Models\Booking;

trait CanMakeReservations
{

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function upcomingBookings()
    {
        return $this->bookings()
            ->whereDate('date', '>=', date('Y-m-d'))
            ->with('resource')
            ->with('resource.location')
            ->orderBy('date', 'asc')
            ->get();
    }

    public function hasReservation($date, $period)
    {
        return $this->bookings()
            ->where('date', $date)
            ->where('period', $period)
            ->first();
    }

}
