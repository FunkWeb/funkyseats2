<?php

namespace App\Console\Commands;

use App\Models\Activity;
use App\Models\Checkin;
use App\Models\User;
use Illuminate\Console\Command;

class ForceCheckout extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:forcecheckout';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Force checkouts all users that are currently checked in';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $checkins = Checkin::where('checkout_at', NULL)->get();
//
//        foreach($checkins as $checkin) {
//            $checkin->update([
//                'checkout_at' => now(),
//                'forced_checkout' => true,
//            ]);
//        }

        $users = User::all();

        foreach($users as $user) {
            if($user->checkedIn) {
                $user->check_out(true);
            }
        }

        return 0;
    }
}
