<?php

namespace App\Http\Controllers;

use App\Models\Property;

class AgentPropertyController extends Controller
{
    public function index()
    {
        $properties = Property::where('user_id', auth()->id())->get();

        return view('agent.properties.index', compact('properties'));
    }
}
