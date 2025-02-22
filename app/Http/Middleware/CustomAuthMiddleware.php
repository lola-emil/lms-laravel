<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Example: Custom logic to check if the user is authenticated
        if (!Auth::check()) {
            // If the user is not authenticated, redirect them to the login page
            return redirect()->route('signin');
        }

        // If authentication is successful, continue with the request
        return $next($request);
    }
}
