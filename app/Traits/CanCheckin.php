<?php

namespace App\Traits;

use App\Models\Checkin;

trait CanCheckin
{

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }

    public function getCheckedInAttribute(): bool
    {
        $checkin = $this->latest_checkin();

        if(!$checkin) {
            return false;
        }

        if($checkin->checkout_at) {
            return false;
        }

        return true;
    }


    public function toggleCheckin()
    {
        $checkin = $this->latest_checkin();

        if(!$checkin) {
            return $this->check_in();
        }

        if($checkin->checkout_at) {
            return $this->check_in();
        }

        return $this->check_out();
    }

    public function getForcedCheckoutsAttribute()
    {
        return $this->checkins()->where('forced_checkout', true)->count();
    }

    private function latest_checkin()
    {
        return $this->checkins()->latest()->first();
    }

    private function check_in()
    {
        return $this->checkins()->create([
            'checkin_at' => now(),
        ]);
    }

    private function check_out($forced = null)
    {
        return $this->latest_checkin()->update([
            'checkout_at' => now(),
            'forced_checkout' => $forced
        ]);
    }

}
