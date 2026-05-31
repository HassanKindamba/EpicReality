<?php

namespace App\Http\Controllers;

use App\Models\Property;

class AgentDashboardController extends Controller
{
    public function index()
    {
        if (!auth()->user()->is_approved) {
            return redirect('/')
                ->with('error', 'Your account is pending admin approval.');
        }

        $properties = auth()->user()->properties;

        return view('agent.dashboard', compact('properties'));
    }
}