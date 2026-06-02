<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    // LIST ALL AGENTS (PENDING + APPROVED)
    public function agents()
    {
        return User::where('role', 'agent')->get();
    }

    // APPROVE AGENT
    public function approveAgent($id)
    {
        $agent = User::where('role', 'agent')->findOrFail($id);

        $agent->update([
            'is_approved' => true,
            'status' => 'active'
        ]);

        return response()->json([
            'message' => 'Agent ameidhinishwa',
            'agent' => $agent
        ]);
    }

    // REJECT AGENT
    public function rejectAgent($id)
    {
        $agent = User::where('role', 'agent')->findOrFail($id);

        $agent->update([
            'is_approved' => false,
            'status' => 'rejected'
        ]);

        return response()->json([
            'message' => 'Agent amekataliwa',
        ]);
    }
}
