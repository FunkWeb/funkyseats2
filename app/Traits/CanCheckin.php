<?php

namespace App\Traits;

use App\Models\Checkin;
use Carbon\Carbon;

trait CanCheckin
{

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }

    public function getCheckedInAttribute(): bool
    {
        $checkin = $this->latest_checkin();

        if (!$checkin) {
            return false;
        }

        if ($checkin->checkout_at) {
            return false;
        }

        return true;
    }


    public function toggleCheckin()
    {
        $checkin = $this->latest_checkin();

        /*
         * If no checkin exists, check in user
         */
        if (!$checkin) {
            flash()->success('Du er nå sjekket inn.');

            return $this->check_in();
        }

        /*
         * If user checked out less than five minutes ago and checks in again, remove the checkout time instead
         */
        if ($checkin->checkout_at > Carbon::now()->subMinutes(5)) {
            flash()->warning('Du sjekket ut for mindre enn fem minutter siden, du ble sjekket inn igjen');

            return $checkin->update(['checkout_at' => null]);
        }

        /*
         * If previous checkin was checked out, create a new checkin record
         */
        if ($checkin->checkout_at) {
            flash()->success('Du er nå sjekket inn.');

            return $this->check_in();
        }

        /*
         * If user checked in less than five minutes ago, just delete the checkin
         */
        if ($checkin->checkin_at > Carbon::now()->subMinutes(5)) {
            flash()->warning('Du sjekket inn for mindre enn fem minutter siden. Oppføringen ble slettet.');

            return $checkin->delete();
        }

        /*
         * Check out the user
         */
        flash()->success('Du er nå sjekket ut.');

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
