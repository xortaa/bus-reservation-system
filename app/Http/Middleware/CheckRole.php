<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        Log::info('User role: ' . $request->user()->role);
        Log::info('Required roles: ' . implode(', ', $roles));

        if (!$request->user() || !$request->user()->hasAnyRole($roles)) {
            Log::warning('Unauthorized access attempt');
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
