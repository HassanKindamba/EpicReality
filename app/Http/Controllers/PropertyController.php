<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    // public function __construct()
    // {
    //     // Only agents can access this controller
    //     $this->middleware(['auth','role:agent']);
    // }

    // List properties owned by logged-in agent
    public function index()
    {
        $properties = Property::where('user_id', Auth::id())->get();
        return view('admin.properties.index', compact('properties'));
    }

    // Show create form
    public function create()
    {
        return view('admin.properties.create');
    }

    // Store new property
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link'  => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);

        $property = new Property();
        $property->title = $request->title;
        $property->link  = $request->link;
        $property->user_id = Auth::id(); // assign agent as owner

        if ($request->hasFile('image')) {
            $property->image = $request->file('image')->store('properties', 'public');
        }

        $property->save();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property added successfully!');
    }

    // Show edit form
    public function edit(Property $property)
    {
        if ($property->user_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('admin.properties.edit', compact('property'));
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('admin.properties.show', compact('property'));
    }

    // Update property
    public function update(Request $request, Property $property)
    {
        if ($property->user_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'link'  => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);

        $property->title = $request->title;
        $property->link  = $request->link;

        if ($request->hasFile('image')) {
            $property->image = $request->file('image')->store('properties', 'public');
        }

        $property->save();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property updated successfully!');
    }

    // Delete property
    public function destroy(Property $property)
    {
        if ($property->user_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted successfully!');
    }
}