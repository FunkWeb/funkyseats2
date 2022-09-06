<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function destroy()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }

    public function create()
    {
        if (auth()->check()) {

            return redirect(route('home'));
        }

        return view('login');
    }
}
