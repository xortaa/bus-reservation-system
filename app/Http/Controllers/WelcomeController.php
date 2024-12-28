<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Schedule;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        $buses = Bus::all();
        $schedules = Schedule::with(['bus', 'route'])
            ->where('departure_date', '>', now())
            ->orderBy('departure_date')
            ->orderBy('departure_time')
            ->get();

        return view('welcome', compact('routes', 'buses', 'schedules'));
    }
}

