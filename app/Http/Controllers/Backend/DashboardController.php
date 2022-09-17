<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Checkin;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function show()
    {
        return view('admin.dashboard', [
            'checkins' => Checkin::whereNull('checkout_at')->with('user')->get()
        ]);
    }
}
