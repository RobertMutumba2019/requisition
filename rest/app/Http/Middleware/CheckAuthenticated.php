<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * If no 'user_id' in session, redirect to login.
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->session()->has('user_id')) {
            // Optionally: save intended URL to redirect after login:
            $request->session()->put('url.intended', $request->fullUrl());
            return redirect()->route('login')
                             ->with('status', 'Please login to access this page.');
        }

        return $next($request);
    }
}
