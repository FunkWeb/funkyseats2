<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/**
 * Session routes, for validating, creating or logging out users
 */

Route::get('login', [SessionController::class, 'create'])->name('login');
Route::get('/auth/google', [GoogleController::class, 'googleRedirect'])->name('google.login');
Route::post('logout', [SessionController::class, 'destroy'])->name('logout');
Route::get('/callback/google', [GoogleController::class, 'googleCallback'])->name('google.callback');

/**
 * Auth routes, for logged in users
 */

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

/**
 * Admin routes, for users with administrator roles
 */

Route::get('admin/users', [\App\Http\Controllers\Backend\UserController::class, 'index'])->name('users.index');
