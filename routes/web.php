<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin and Employee routes
    Route::middleware(['role:admin,employee'])->group(function () {
        Route::resource('buses', BusController::class);
        Route::resource('routes', RouteController::class);
        Route::resource('schedules', ScheduleController::class);
    });

    // Admin only routes
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserController::class);
        // Add routes for logs here
    });

    // Customer routes
    Route::middleware(['role:customer'])->group(function () {
        Route::get('buses', [BusController::class, 'index'])->name('buses.index');
        Route::get('routes', [RouteController::class, 'index'])->name('routes.index');
        Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store', 'show']);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

