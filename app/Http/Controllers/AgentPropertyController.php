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
    'link' => $request->link,
    'availability_status' => $request->availability_status,
    'property_type' => $request->property_type,
    'visibility_status' => 'Hidden',
    'user_id' => Auth::id(),
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
        'link' => 'nullable|string',
        'availability_status' => 'required',
        'property_type' => 'required',
    ]);

    // 👇 FORCE ASSIGN (more reliable kuliko mass update)
    $property->title = $request->title;
    $property->price = $request->price;
    $property->location = $request->location;
    $property->description = $request->description;
    $property->link = $request->link;
    $property->availability_status = $request->availability_status;
    $property->property_type = $request->property_type;

    // keep old visibility
    $property->visibility_status = $property->visibility_status;

    // image upload
    if ($request->hasFile('image')) {
        $property->image = $request->file('image')->store('properties', 'public');
    }

    $property->save();

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