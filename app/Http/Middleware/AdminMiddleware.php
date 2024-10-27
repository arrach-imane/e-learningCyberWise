<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the admin role
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        // If the user is not an admin, redirect to the home page or an appropriate page
        return redirect('/');
    }
}
