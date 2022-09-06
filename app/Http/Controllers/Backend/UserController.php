<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::whereNull('anonymized_at')->orderBy('name')->get();

        return view('backend.user.index',
        [
            'users' => User::whereNull('anonymized_at')->orderBy('name')->get(),
        ]);
    }
}
