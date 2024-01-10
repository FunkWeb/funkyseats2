<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index',
            [
                'users' => User::whereNull('anonymized_at')->orderBy('name')->get(),
            ]);
    }

    public function show(User $user)
    {
        if(auth()->user()->cannot('view', $user)) {
            abort(404);
        }

        return view('admin.users.show', [
            'user' => $user,
            'latest_checkins' => $user->checkins()->latest()->limit(10)->get(),
            'activities' => $user->activities()->where('created_at', '>', now()->subDays(30))
                ->with('subject')
                ->latest()->get(),
            'bookings' => $user->upcomingBookings(),
        ]);
    }
}
