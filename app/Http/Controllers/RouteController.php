<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Route::class, 'route');
    }

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
            'duration' => 'required|numeric|min:0',
        ]);

        try {
            $route = Route::create($validated);
            Log::info('Route created successfully', ['route_id' => $route->route_id]);
            return redirect()->route('routes.index')->with('success', 'Route created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating route', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to create route. Please try again.')->withInput();
        }
    }

    public function show(Route $route)
    {
        return view('routes.show', compact('route'));
    }

    public function edit(Route $route)
    {
        return view('routes.edit', compact('route'));
    }

    public function update(Request $request, Route $route)
    {
        $validated = $request->validate([
            'route_name' => 'required|string|max:255',
            'departure_location' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'distance' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:0',
        ]);

        try {
            $hours = floor($validated['duration']);
            $minutes = floor(($validated['duration'] - $hours) * 60);
            $seconds = floor((($validated['duration'] - $hours) * 60 - $minutes) * 60);
            $validated['duration'] = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

            $route->update($validated);
            Log::info('Route updated successfully', ['route_id' => $route->route_id]);
            return redirect()->route('routes.index')->with('success', 'Route updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating route', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to update route. Please try again.')->withInput();
        }
    }

    public function destroy(Route $route)
    {
        try {
            $route->delete();
            Log::info('Route deleted successfully', ['route_id' => $route->route_id]);
            return redirect()->route('routes.index')->with('success', 'Route deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting route', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to delete route. Please try again.');
        }
    }
}

