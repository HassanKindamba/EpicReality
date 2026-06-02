<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureAgentApproved
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role === 'agent' && !$request->user()->is_approved) {
            return response()->json([
                'message' => 'Akaunti yako bado haijaidhinishwa na admin'
            ], 403);
        }

        return $next($request);
    }
}
