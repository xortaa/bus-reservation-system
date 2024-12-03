<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $buses = Bus::when($search, function ($query, $search) {
            return $query->where('bus_number', 'like', "%{$search}%")
                         ->orWhere('driver_name', 'like', "%{$search}%")
                         ->orWhere('departure_location', 'like', "%{$search}%")
                         ->orWhere('destination', 'like', "%{$search}%");
        })->paginate(10);

        return view('buses.index', compact('buses', 'search'));
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bus_number' => 'required|unique:buses',
            'seating_capacity' => 'required|integer',
            'driver_name' => 'required',
            'departure_location' => 'required',
            'destination' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('bus_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        Bus::create($validatedData);

        return redirect()->route('buses.index')->with('success', 'Bus created successfully.');
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
        $validatedData = $request->validate([
            'bus_number' => 'required|unique:buses,bus_number,' . $bus->bus_id . ',bus_id',
            'seating_capacity' => 'required|integer',
            'driver_name' => 'required',
            'departure_location' => 'required',
            'destination' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('bus_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $bus->update($validatedData);

        return redirect()->route('buses.index')->with('success', 'Bus updated successfully.');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();

        return redirect()->route('buses.index')->with('success', 'Bus deleted successfully.');
    }
}

