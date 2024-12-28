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
    Route::get('buses', [BusController::class, 'index'])->name('buses.index');

    // Admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('buses', BusController::class)->except(['index']);
        Route::resource('routes', RouteController::class)->except(['index']);
       
        
    });

    Route::middleware(['auth', 'role:admin,employee'])->group(function () {
    Route::resource('schedules', ScheduleController::class);
});

    // Employee routes
    Route::middleware(['role:employee'])->group(function () {
        Route::resource('buses', BusController::class)->except(['index', 'destroy']);
        Route::resource('routes', RouteController::class)->except(['index', 'destroy']);
       
        
    });

    // Customer routes
    Route::middleware(['auth'])->group(function () {
        Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store', 'show']);
    });

    // Admin and Employee routes
    Route::middleware(['auth', 'role:admin,employee'])->group(function () {
        Route::resource('reservations', ReservationController::class)->except(['create', 'store']);
    });


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';

