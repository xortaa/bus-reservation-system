<?php

namespace App\Policies;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Reservation $reservation)
    {
        return $user->isAdmin() || $user->isEmployee() || $reservation->passenger_name === $user->name || $reservation->contact_information === $user->email;
    }

    public function create(User $user)
    {
        return true; // Allow all authenticated users to create reservations
    }

    public function update(User $user, Reservation $reservation)
    {
        return $user->isAdmin() || $user->isEmployee() || $reservation->passenger_name === $user->name || $reservation->contact_information === $user->email;
    }

    public function delete(User $user, Reservation $reservation)
    {
        return $user->isAdmin() || ($user->isCustomer() && ($reservation->passenger_name === $user->name || $reservation->contact_information === $user->email));
    }
}

