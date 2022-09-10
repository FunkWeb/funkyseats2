<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Resource;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Location $location, $date = null)
    {
        if(!$date) {
            $date = date('Y-m-d');
        }

        return view('booking.location', [
            'date' => $date,
            'location' => $location,
            'resources' => $location->resources->sortBy('name', SORT_NATURAL),
//            'bookings' => $location->resources->bookings->whereBetween(now(), now()->addDay()),
        ]);
    }
}
