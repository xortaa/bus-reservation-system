<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;

Route::get('/', function () {
    return view('home');
});

Route::resource('buses', BusController::class);

