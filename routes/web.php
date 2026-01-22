<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuditLogController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

    /*
    |--------------------------------------------------------------------------
    | Admin & Manager: Hotels & Rooms
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin,manager'])->group(function () {

        Route::resource('hotels', HotelController::class);
        Route::resource('rooms', RoomController::class);

    });

    /*
    |--------------------------------------------------------------------------
    | Bookings (Admin / Manager / Receptionist)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth','role:admin,manager,receptionist'])->group(function () {

        Route::resource('bookings', BookingController::class)
            ->only(['index', 'create', 'store', 'destroy']);

    });

    /*
    |--------------------------------------------------------------------------
    | Audit Logs (Admin Only)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])->group(function () {

        Route::get('/audit-logs', [AuditLogController::class, 'index'])
            ->name('audit-logs.index');

    });
});
