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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect(route('users.show', auth()->user()));
    })->name('home');

    Route::post('togglecheckin', [\App\Http\Controllers\CheckinController::class, 'toggle'])
        ->name('checkin');

    Route::get('book/{location}/{date?}', [\App\Http\Controllers\BookingController::class, 'index'])
        ->name('booking.index');
    Route::post('book/{resource}', [\App\Http\Controllers\BookingController::class, 'store'])
        ->name('booking.store');
    Route::delete('book/{booking}', [\App\Http\Controllers\BookingController::class, 'destroy'])
        ->name('booking.destroy');

    Route::get('users/{user}', [\App\Http\Controllers\Backend\UserController::class, 'show'])
        ->name('users.show');
});

/**
 * Admin routes, for users with administrator roles
 */

Route::group(['middleware' => 'role:admin'], function () {
    Route::get('admin/users', [\App\Http\Controllers\Backend\UserController::class, 'index'])
        ->name('admin.users.index');
    Route::get('admin', [\App\Http\Controllers\Backend\DashboardController::class, 'show'])
        ->name('admin.dashboard');

    Route::get('admin/location', [\App\Http\Controllers\Backend\LocationController::class, 'index'])
        ->name('admin.locations.index');
    Route::get('admin/location/create', [\App\Http\Controllers\Backend\LocationController::class, 'create'])
        ->name('admin.locations.create');
    Route::post('admin/location', [\App\Http\Controllers\Backend\LocationController::class, 'store'])
        ->name('admin.locations.store');
    Route::get('admin/location/{location}', [\App\Http\Controllers\Backend\LocationController::class, 'show'])
        ->name('admin.locations.show');
    Route::get('admin/location/{location}/edit', [\App\Http\Controllers\Backend\LocationController::class, 'edit'])
        ->name('admin.locations.edit');
    Route::patch('admin/location/{location}/edit', [\App\Http\Controllers\Backend\LocationController::class, 'update'])
        ->name('admin.locations.update');

    Route::get('admin/location/{location}/resource/create', [\App\Http\Controllers\Backend\ResourceController::class, 'create'])
        ->name('admin.resources.create');
    Route::post('admin/location/{location}/resource', [\App\Http\Controllers\Backend\ResourceController::class, 'store'])
        ->name('admin.resources.store');
    Route::get('admin/location/{location}/resource/{resource}/edit', [\App\Http\Controllers\Backend\ResourceController::class, 'edit'])
        ->name('admin.resources.edit');
    Route::patch('admin/location/{location}/resource/{resource}', [\App\Http\Controllers\Backend\ResourceController::class, 'update'])
        ->name('admin.resources.update');

    Route::get('admin/location/{location}/bookings/{date}', [\App\Http\Controllers\Backend\LocationController::class, 'showBookings'])->name('location.bookings.show');
});
