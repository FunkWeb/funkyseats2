<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('admin.users.show', ['user' => $user]);
    }
}
