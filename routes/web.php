<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/home', [WelcomeController::class, 'index'])->name('home');

// Remove or comment out the existing '/' route
// Route::get('/', [WelcomeController::class, 'index']);

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Routes accessible by all authenticated users
    Route::resource('buses', BusController::class)->only(['index', 'show']);
    Route::resource('routes', RouteController::class)->only(['index', 'show']);
    Route::resource('reservations', ReservationController::class);

    // Admin and Employee routes
    Route::middleware(['role:admin,employee'])->group(function () {
        Route::resource('buses', BusController::class)->except(['index', 'show']);
        Route::resource('routes', RouteController::class)->except(['index', 'show']);
        Route::resource('schedules', ScheduleController::class);
    });

    // Admin-only routes
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

