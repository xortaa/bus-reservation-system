<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Bus;
use App\Policies\BusPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Bus::class => BusPolicy::class,
         Reservation::class => ReservationPolicy::class,
        Schedule::class => SchedulePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        // You can add any custom Gates here if needed
    }
}

