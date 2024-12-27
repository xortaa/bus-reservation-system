<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Reservation::class);
        $user = Auth::user();
        
        if ($user->isAdmin() || $user->isEmployee()) {
            $reservations = Reservation::with(['schedule.bus', 'schedule.route'])->paginate(10);
        } else {
            $reservations = Reservation::where('passenger_name', $user->name)
                                       ->orWhere('contact_information', $user->email)
                                       ->with(['schedule.bus', 'schedule.route'])
                                       ->paginate(10);
        }
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $this->authorize('create', Reservation::class);
        $schedules = Schedule::with(['bus', 'route'])->get();
        return view('reservations.create', compact('schedules'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Reservation::class);
        $validated = $request->validate([
            'schedule_id' => 'required|exists:schedules,schedule_id',
            'passenger_name' => 'required|string|max:255',
            'contact_information' => 'required|string|max:255',
            'seat_number' => 'required|string|max:10',
            'reservation_date' => 'required|date',
            'status' => 'required|in:reserved,canceled,boarded',
        ]);

        try {
            $reservation = Reservation::create($validated);
            Log::info('Reservation created successfully', ['reservation_id' => $reservation->reservation_id]);
            return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating reservation', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to create reservation. Please try again.')->withInput();
        }
    }

    public function show(Reservation $reservation)
    {
        $this->authorize('view', $reservation);
        $reservation->load(['schedule.bus', 'schedule.route']);
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $this->authorize('update', $reservation);
        $schedules = Schedule::with(['bus', 'route'])->get();
        return view('reservations.edit', compact('reservation', 'schedules'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $this->authorize('update', $reservation);
        $validated = $request->validate([
            'schedule_id' => 'required|exists:schedules,schedule_id',
            'passenger_name' => 'required|string|max:255',
            'contact_information' => 'required|string|max:255',
            'seat_number' => 'required|string|max:10',
            'reservation_date' => 'required|date',
            'status' => 'required|in:reserved,canceled,boarded',
        ]);

        try {
            $reservation->update($validated);
            Log::info('Reservation updated successfully', ['reservation_id' => $reservation->reservation_id]);
            return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating reservation', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to update reservation. Please try again.')->withInput();
        }
    }

    public function destroy(Reservation $reservation)
    {
        $this->authorize('delete', $reservation);
        try {
            $reservation->delete();
            Log::info('Reservation deleted successfully', ['reservation_id' => $reservation->reservation_id]);
            return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting reservation', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to delete reservation. Please try again.');
        }
    }
}

