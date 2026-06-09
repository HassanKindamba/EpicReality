<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function stats(Request $request)
    {
        return response()->json([
            'debug' => 'HELLO_ADMIN_STATS',
            'time' => now()->toDateTimeString(),
        ]);
    }
}