<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function toggle()
    {
        auth()->user()->toggleCheckin();

        return redirect()->back();
    }
}
