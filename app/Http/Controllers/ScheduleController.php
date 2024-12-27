<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Bus;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Schedule::class);
        $schedules = Schedule::with(['bus', 'route'])->paginate(10);
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $this->authorize('create', Schedule::class);
        $buses = Bus::all();
        $routes = Route::all();
        return view('schedules.create', compact('buses', 'routes'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Schedule::class);
        $validated = $request->validate([
            'bus_id' => 'required|exists:buses,bus_id',
            'route_id' => 'required|exists:routes,route_id',
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'available_seats' => 'required|integer|min:0',
        ]);

        try {
            $schedule = Schedule::create($validated);
            Log::info('Schedule created successfully', ['schedule_id' => $schedule->schedule_id]);
            return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating schedule', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to create schedule. Please try again.')->withInput();
        }
    }

    public function show(Schedule $schedule)
    {
        $this->authorize('view', $schedule);
        $schedule->load(['bus', 'route']);
        return view('schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $this->authorize('update', $schedule);
        $buses = Bus::all();
        $routes = Route::all();
        return view('schedules.edit', compact('schedule', 'buses', 'routes'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $this->authorize('update', $schedule);
        $validated = $request->validate([
            'bus_id' => 'required|exists:buses,bus_id',
            'route_id' => 'required|exists:routes,route_id',
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'available_seats' => 'required|integer|min:0',
        ]);

        try {
            $schedule->update($validated);
            Log::info('Schedule updated successfully', ['schedule_id' => $schedule->schedule_id]);
            return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating schedule', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to update schedule. Please try again.')->withInput();
        }
    }

    public function destroy(Schedule $schedule)
    {
        $this->authorize('delete', $schedule);
        try {
            $schedule->delete();
            Log::info('Schedule deleted successfully', ['schedule_id' => $schedule->schedule_id]);
            return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting schedule', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to delete schedule. Please try again.');
        }
    }
}

