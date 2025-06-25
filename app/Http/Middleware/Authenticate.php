<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            // Check the current path to determine which login route to use
            if ($request->is('admin/*') || $request->is('admin')) {
                return route('admin.login');
            } elseif ($request->is('penyelenggara/*') || $request->is('penyelenggara')) {
                return route('penyelenggara.login');
            }
            return route('login');
        }
        return null;
    }
}
