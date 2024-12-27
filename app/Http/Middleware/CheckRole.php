<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Convert comma-separated string to array if necessary
        $roles = count($roles) === 1 && str_contains($roles[0], ',') 
            ? explode(',', $roles[0]) 
            : $roles;

        if (!$request->user()) {
            Log::warning('No authenticated user found');
            abort(403, 'Unauthorized action.');
        }

        // Log the current check
        Log::info('Role check - User role: ' . $request->user()->role);
        Log::info('Role check - Required roles: ' . implode(', ', $roles));

        if (!$request->user()->hasAnyRole($roles)) {
            Log::warning('User does not have required roles');
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

