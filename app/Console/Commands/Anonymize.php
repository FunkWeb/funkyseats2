<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Anonymize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:anonymize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Anonymize users that haven\'t been active in 90 days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('last_active_at', '<', Carbon::now()->subDays(90))->get();

        foreach($users as $user) {
            $user->anonymize();
        }

        dd($users);

        return 0;
    }
}
