<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Resource;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Location $location, $date = null)
    {
        $date = $this->setDate($date);

        return view('booking.location', [
            'date' => $date,
            'location' => $location,
            'resources' => $location->resources->sortBy('name', SORT_NATURAL),
            'nextdays' => $this->nextSevenDays(),
//            'bookings' => $location->resources->bookings->whereBetween(now(), now()->addDay()),
        ]);
    }

    private function setDate($date = null): string
    {
        if (isset($date) && $this->validateDate($date)) {
            return $date;
        }

        return date('Y-m-d');
    }

    private function validateDate($date = null): bool
    {
        if (!$date) {
            return true;
        }

        try {
            Carbon::parse($date)->format('Y-m-d');
        } catch (InvalidFormatException $_) {
            flash()->error($date . ' er ikke en gyldig dato, bruker dagens dato i stedet.');

            return false;
        }

        if(Carbon::now()->startOfDay()->gt($date)) {
            flash()->error('Du kan ikke booke bakover i tid, bruker dagens dato i stedet.');

            return false;
        }

        if (Carbon::parse($date) > Carbon::now()->addDays(7)) {
            flash()->error('Du kan ikke booke mer enn 7 dager fremover i tid.');

            return false;
        }

        return true;
    }

    private function nextSevenDays(): array
    {
        $result = [];

        for ($i = 0; $i <= 7; $i++) {
            if (Carbon::now()->addDays($i)->dayOfWeekIso < 6) {
                $date = Carbon::now()->addDays($i);
                $result[] = [
                    $date->format('Y-m-d'),
                    $date->translatedFormat('l d. F')
                ];
            }
        }

        return $result;
    }
}
