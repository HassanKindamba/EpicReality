<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    // List all properties (admin)
    public function index()
    {
        $properties = Property::with('images')->get();
        return view('admin.properties.index', compact('properties'));
    }

    // List properties owned by agent
    public function agentIndex()
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
        'link'  => 'required|url|max:255',
        'location' => 'required|string|max:255',
        'description' => 'nullable|string',
        'availability_status' => 'required|in:Available,Occupied,Not In Use',
        'property_type' => 'required|in:Apartment,House,Commercial',
        'price' => 'required|numeric',
        'images' => 'nullable',
        'images.*' => 'image|max:2048',
    ]);

    $property = Property::create([
        'title' => $request->title,
        'link' => $request->link,
        'location' => $request->location,
        'description' => $request->description,
        'availability_status' => $request->availability_status,
        'property_type' => $request->property_type,
        'price' => $request->price,
        'user_id' => Auth::id(),
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $img) {

            $path = $img->store('properties', 'public');

            PropertyImage::create([
                'property_id' => $property->id,
                'image_path' => $path
            ]);
        }
    }

    return redirect()->route('admin.properties.index')
        ->with('success', 'Property added successfully!');
}
    // Show single property
    public function show($id)
{
    $property = Property::findOrFail($id);
    return view('admin.properties.show', compact('property'));
}

    // Edit property
    public function edit(Property $property)
    {
        if ($property->user_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('admin.properties.edit', compact('property'));
    }

    // Edit visibility (admin only)
    public function editVisibility(Property $property)
    {
        if (auth()->user()->role == 'agent') {
            abort(403, 'Unauthorized');
        }

        return view('admin.properties.edit-visibility', compact('property'));
    }

    // Update property
    public function update(Request $request, Property $property)
    {
        if ($property->user_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'link'  => 'required|url|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'availability_status' => 'required|in:Available,Occupied,Not In Use',
            'property_type' => 'required|in:Apartment,House,Commercial',
            'price' => 'required|numeric',

            // MULTIPLE IMAGES
            'images' => 'nullable',
            'images.*' => 'image|max:2048',
        ]);

        $property->title = $request->title;
        $property->link = $request->link;
        $property->location = $request->location;
        $property->description = $request->description;
        $property->availability_status = $request->availability_status;
        $property->property_type = $request->property_type;
        $property->price = $request->price;
        $property->save();

        // Replace images (delete old + add new)
        if ($request->hasFile('images')) {

            PropertyImage::where('property_id', $property->id)->delete();

            foreach ($request->file('images') as $img) {
                $path = $img->store('properties', 'public');

                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('admin.properties.index')
                         ->with('success', 'Property updated successfully!');
    }

    // Delete property
    public function destroy(Property $property)
    {
        if ($property->user_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // delete images first
        PropertyImage::where('property_id', $property->id)->delete();

        $property->delete();

        return redirect()->route('admin.properties.index')
                         ->with('success', 'Property deleted successfully!');
    }
}