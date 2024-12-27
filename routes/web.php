<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Routes accessible by all authenticated users
    Route::get('routes', [RouteController::class, 'index'])->name('routes.index');

    // Admin and Employee routes
    Route::middleware(['role:admin,employee'])->group(function () {
        Route::resource('buses', BusController::class)->except(['index']);
        Route::resource('routes', RouteController::class)->except(['index']);
        Route::resource('schedules', ScheduleController::class);
        Route::resource('reservations', ReservationController::class)->except(['index', 'create', 'store', 'show']);
    });

    // Admin only routes
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserController::class);
    });

    // Customer routes
    Route::middleware(['role:customer'])->group(function () {
        Route::get('buses', [BusController::class, 'index'])->name('buses.index');
        Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store', 'show']);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

