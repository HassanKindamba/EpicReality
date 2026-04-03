<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        return view('admin.agents.index', compact('agents'));
    }

    public function create()
    {
        return view('admin.agents.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'email'       => 'required|email|max:255',
        'phone'       => 'required|string|max:20',
        'description' => 'required|string',
        'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $agent = new Agent();

    $agent->name        = $request->name;
    $agent->email       = $request->email;
    $agent->phone       = $request->phone;
    $agent->description = $request->description;

    if ($request->hasFile('photo')) {
        $agent->photo = $request->file('photo')->store('agents', 'public');
    }

    $agent->save();

    return redirect()->route('admin.agents.index')
        ->with('success', 'Agent added successfully!');
}


    public function edit(Agent $agent)
    {
        return view('admin.agents.edit', compact('agent'));
    }

    public function update(Request $request, Agent $agent)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'email'       => 'required|email|max:255',
        'phone'       => 'required|string|max:20',
        'description' => 'required|string',
        'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $agent->name        = $request->name;
    $agent->email       = $request->email;
    $agent->phone       = $request->phone;
    $agent->description = $request->description;

    if ($request->hasFile('photo')) {

        // Futa picha ya zamani kama ipo
        if ($agent->photo && \Storage::disk('public')->exists($agent->photo)) {
            \Storage::disk('public')->delete($agent->photo);
        }

        // Hifadhi picha mpya
        $agent->photo = $request->file('photo')->store('agents', 'public');
    }

    $agent->save();

    return redirect()->route('admin.agents.index')
        ->with('success', 'Agent updated successfully!');
}

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('admin.agents.index')->with('success', 'Agent deleted successfully!');
    }
}
