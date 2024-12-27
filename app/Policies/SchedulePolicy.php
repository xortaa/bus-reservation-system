<?php

namespace App\Policies;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    public function view(User $user, Schedule $schedule)
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    public function create(User $user)
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    public function update(User $user, Schedule $schedule)
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    public function delete(User $user, Schedule $schedule)
    {
        return $user->isAdmin();
    }
}

