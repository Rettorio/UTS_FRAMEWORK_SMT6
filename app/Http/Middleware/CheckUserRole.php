<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole {
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles  // This allows passing multiple roles e.g., 'admin', 'penyelenggara'
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // User is not authenticated, redirect to login
            return redirect()->route('login'); // Or your main login route name
        }

        $user = Auth::user();

        // Convert role constants to actual values for comparison if needed
        // For example, if User::$ROLE_ADMIN is 'admin'
        $allowedRoles = [
            User::$ROLE_ADMIN,
            User::$ROLE_CONSUMER,
            User::$ROLE_PENYELENGGARA
        ];

        if (!in_array($user->role, $allowedRoles)) {
            // User does not have the required role
            Auth::logout(); // Log out the unauthorized user for security
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors(['error' => 'You do not have permission to access this page.']);
            // Alternatively, redirect to a generic "unauthorized" page:
            // return redirect('/unauthorized')->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}