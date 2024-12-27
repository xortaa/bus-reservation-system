<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::paginate(10);
        return view('buses.index', compact('buses'));
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store(Request $request)
    {
        Log::info('Starting bus creation process');
        
        try {
            $validated = $request->validate([
                'bus_number' => 'required|string|unique:buses,bus_number',
                'seating_capacity' => 'required|integer|min:1',
                'driver_name' => 'required|string',
                'departure_location' => 'required|string',
                'destination' => 'required|string',
                'departure_time' => 'required',
                'arrival_time' => 'required|after:departure_time',
                'image' => 'nullable|image|max:2048'
            ]);

            Log::info('Validation passed', $validated);

            // Handle image upload if present
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('buses', 'public');
                $validated['image'] = $imagePath;
                Log::info('Image uploaded successfully', ['path' => $imagePath]);
            }

            // Create the bus record
            $bus = Bus::create($validated);
            Log::info('Bus created successfully', ['bus_id' => $bus->bus_id]);

            return redirect()
                ->route('buses.index')
                ->with('success', 'Bus created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error', ['errors' => $e->errors()]);
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error creating bus', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()
                ->with('error', 'Failed to create bus. Please try again.')
                ->withInput();
        }
    }

    public function show(Bus $bus)
    {
        return view('buses.show', compact('bus'));
    }

    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        try {
            $validated = $request->validate([
                'bus_number' => 'required|string|unique:buses,bus_number,' . $bus->bus_id . ',bus_id',
                'seating_capacity' => 'required|integer|min:1',
                'driver_name' => 'required|string',
                'departure_location' => 'required|string',
                'destination' => 'required|string',
                'departure_time' => 'required',
                'arrival_time' => 'required|after:departure_time',
                'image' => 'nullable|image|max:2048'
            ]);

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($bus->image) {
                    Storage::disk('public')->delete($bus->image);
                }
                $validated['image'] = $request->file('image')->store('buses', 'public');
            }

            $bus->update($validated);

            return redirect()
                ->route('buses.index')
                ->with('success', 'Bus updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating bus', [
                'bus_id' => $bus->bus_id,
                'error' => $e->getMessage()
            ]);
            return back()
                ->with('error', 'Failed to update bus. Please try again.')
                ->withInput();
        }
    }

    public function destroy(Bus $bus)
    {
        try {
            if ($bus->image) {
                Storage::disk('public')->delete($bus->image);
            }
            $bus->delete();
            return redirect()
                ->route('buses.index')
                ->with('success', 'Bus deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting bus', [
                'bus_id' => $bus->bus_id,
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Failed to delete bus. Please try again.');
        }
    }
}

