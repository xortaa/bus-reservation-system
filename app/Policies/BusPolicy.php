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
        return true; // All authenticated users can view the list of buses
    }

    public function view(User $user, Bus $bus)
    {
        return true; // All authenticated users can view bus details
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
        return $user->isAdmin() || $user->isEmployee();
    }
}

