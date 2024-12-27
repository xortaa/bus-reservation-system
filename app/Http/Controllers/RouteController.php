<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::paginate(10);
        return view('routes.index', compact('routes'));
    }

    public function create()
    {
        return view('routes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'route_name' => 'required|string|max:255',
            'departure_location' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'distance' => 'required|numeric|min:0',
            'duration_hours' => 'required|integer|min:0',
            'duration_minutes' => 'required|integer|min:0|max:59',
        ]);

        $duration = sprintf('%02d:%02d:00', $validated['duration_hours'], $validated['duration_minutes']);

        Route::create([
            'route_name' => $validated['route_name'],
            'departure_location' => $validated['departure_location'],
            'destination' => $validated['destination'],
            'distance' => $validated['distance'],
            'duration' => $duration,
        ]);

        return redirect()->route('routes.index')->with('success', 'Route created successfully.');
    }

    public function show(Route $route)
    {
        return view('routes.show', compact('route'));
    }

    public function edit(Route $route)
    {
        $duration_parts = explode(':', $route->duration);
        $route->duration_hours = (int) $duration_parts[0];
        $route->duration_minutes = (int) $duration_parts[1];
        return view('routes.edit', compact('route'));
    }

    public function update(Request $request, Route $route)
    {
        Log::info('Update method called', $request->all());

        $validated = $request->validate([
            'route_name' => 'required|string|max:255',
            'departure_location' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'distance' => 'required|numeric|min:0',
            'duration_hours' => 'sometimes|required|integer|min:0',
            'duration_minutes' => 'sometimes|required|integer|min:0|max:59',
        ]);

        if (isset($validated['duration_hours']) && isset($validated['duration_minutes'])) {
            $duration = sprintf('%02d:%02d:00', $validated['duration_hours'], $validated['duration_minutes']);
        } else {
            $duration = $route->duration;
        }

        $route->update([
            'route_name' => $validated['route_name'],
            'departure_location' => $validated['departure_location'],
            'destination' => $validated['destination'],
            'distance' => $validated['distance'],
            'duration' => $duration,
        ]);

        Log::info('Update result', ['route' => $route->toArray()]);

        return redirect()->route('routes.index')->with('success', 'Route updated successfully.');
    }

    public function destroy(Route $route)
    {
        $route->delete();

        return redirect()->route('routes.index')->with('success', 'Route deleted successfully.');
    }
}

