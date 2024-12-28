<?php

namespace App\Policies;

use App\Models\Route;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoutePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true; // Allow all users to view routes
    }

    public function view(User $user, Route $route)
    {
        return true; // Allow all users to view individual routes
    }

    public function create(User $user)
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    public function update(User $user, Route $route)
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    public function delete(User $user, Route $route)
    {
        return $user->isAdmin();
    }
}

