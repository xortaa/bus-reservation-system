<?php

namespace App\Policies;

use App\Models\Bus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true; // Allow all users to view buses
    }

    public function view(User $user, Bus $bus)
    {
        return true; // Allow all users to view individual buses
    }

    public function create(User $user)
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    public function update(User $user, Bus $bus)
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    public function delete(User $user, Bus $bus)
    {
        return $user->isAdmin();
    }
}

