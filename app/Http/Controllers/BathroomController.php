<?php

namespace App\Http\Controllers;

use App\Models\Bathroom;
use App\Models\Property;
use App\Models\Image;
use Illuminate\Http\Request;

class BathroomController extends Controller
{
    // Show all bathrooms (optional API)
    public function index()
    {
        return Bathroom::all();
    }

    // Show create form
    public function create($property)
    {
        $property = Property::findOrFail($property);

        return view('admin.bathrooms.create', compact('property'));
    }

    // Store bathroom (UPDATED)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'bedroom_id' => 'nullable|exists:bedrooms,id',
            'number' => 'required|integer',
            'type' => 'nullable',
            'shower' => 'nullable',
            'doors' => 'nullable',
            'image' => 'nullable|image',
            'area' => 'nullable',
            'description' => 'nullable',

            // multiple images (optional)
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // CREATE bathroom first
        $bathroom = Bathroom::create([
            'property_id' => $validated['property_id'],
            'bedroom_id' => $validated['bedroom_id'] ?? null,
            'number' => $validated['number'],
            'type' => $validated['type'] ?? null,
            'shower' => $validated['shower'] ?? null,
            'doors' => $validated['doors'] ?? null,
            'area' => $validated['area'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);

        // SINGLE IMAGE (main image)
        if ($request->hasFile('image')) {
            $bathroom->image = $request->file('image')->store('bathrooms', 'public');
            $bathroom->save();
        }

        // MULTIPLE IMAGES (gallery)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('bathrooms', 'public');

                Image::create([
                    'bathroom_id' => $bathroom->id,
                    'path' => $path
                ]);
            }
        }

        return redirect()
            ->route('admin.properties.show', $validated['property_id'])
            ->with('success', 'Bathroom added successfully!');
    }

    // Show single bathroom
    public function show($id)
    {
        $bathroom = Bathroom::findOrFail($id);

        return view('admin.bathrooms.show', compact('bathroom'));
    }

    // Update bathroom
    public function update(Request $request, $id)
    {
        $bathroom = Bathroom::findOrFail($id);

        $bathroom->update($request->all());

        return redirect()->back()->with('success', 'Bathroom updated successfully!');
    }

    // Delete bathroom
    public function destroy($id)
    {
        Bathroom::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Bathroom deleted successfully!');
    }
}