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
        'name'  => 'required|string|max:255',
        // 'email' => 'required|email',
        'phone' => 'required',
        'photo' => 'nullable|image',
    ]);

    $agent = new Agent();   // 👈 hakuna create()

    $agent->name  = $request->name;
    // $agent->email = $request->email;
    $agent->phone = $request->phone;

    if ($request->hasFile('photo')) {
        $agent->photo = $request->file('photo')->store('agents', 'public');
    }

    $agent->save(); // 👈 hapa ndiyo save

    return redirect()->route('agents.index')
        ->with('success', 'Agent added successfully!');
}

    public function edit(Agent $agent)
    {
        return view('admin.agents.edit', compact('agent'));
    }

    public function update(Request $request, Agent $agent)
{
    $request->validate([
        'name'  => 'required|string|max:255',
        // 'email' => 'required|email',
        'phone' => 'required',
        'photo' => 'nullable|image',
    ]);

    $agent->name  = $request->name;
    // $agent->email = $request->email;
    $agent->phone = $request->phone;

    if ($request->hasFile('photo')) {
        $agent->photo = $request->file('photo')->store('agents', 'public');
    }

    $agent->save();

    return redirect()->route('agents.index')
        ->with('success', 'Agent updated successfully!');
}

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agents.index')->with('success', 'Agent deleted successfully!');
    }
}
