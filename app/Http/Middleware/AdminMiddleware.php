<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Hii inachunguza case-insensitive role
        if (Auth::check() && strtolower(Auth::user()->role) === 'admin') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}