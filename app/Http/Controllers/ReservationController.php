<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('schedule')->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'passenger_name' => 'required|string|max:255',
            'contact_information' => 'required|string|max:255',
            'seat_number' => 'required|string|max:10',
            'reservation_date' => 'required|date',
            'status' => 'required|in:reserved,canceled,boarded',
        ]);

        Reservation::create($validated);

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'passenger_name' => 'required|string|max:255',
            'contact_information' => 'required|string|max:255',
            'seat_number' => 'required|string|max:10',
            'reservation_date' => 'required|date',
            'status' => 'required|in:reserved,canceled,boarded',
        ]);

        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully');
    }
}

