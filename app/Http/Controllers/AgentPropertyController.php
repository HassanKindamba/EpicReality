<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentPropertyController extends Controller
{
    /**
     * Show all properties owned by agent
     */
    public function index()
    {
        $properties = Property::where('user_id', Auth::id())->get();

        return view('agent.properties.index', compact('properties'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('agent.properties.create');
    }

    /**
     * Store new property
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required',
            'location' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Property::create([
            'title' => $request->title,
            'price' => $request->price,
            'location' => $request->location,
            'description' => $request->description,
            'user_id' => Auth::id(), // IMPORTANT: assign to agent
        ]);

        return redirect()->route('agent.properties.index')
            ->with('success', 'Property created successfully');
    }

    /**
     * Show edit form (ONLY OWN PROPERTY)
     */
    public function edit($id)
    {
        $property = Property::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('agent.properties.edit', compact('property'));
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);

        return view('agent.properties.show', compact('property'));
    }

    /**
     * Update property (ONLY OWN PROPERTY)
     */
    public function update(Request $request, $id)
    {
        $property = Property::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required',
            'location' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $property->update([
            'title' => $request->title,
            'price' => $request->price,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect()->route('agent.properties.index')
            ->with('success', 'Property updated successfully');
    }

    /**
     * Delete property (ONLY OWN PROPERTY)
     */
    public function destroy($id)
    {
        $property = Property::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $property->delete();

        return redirect()->route('agent.properties.index')
            ->with('success', 'Property deleted successfully');
    }
}