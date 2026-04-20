<?php

namespace App\Http\Controllers;

use App\Models\Bathroom;
use App\Models\Property;
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

    // Store bathroom
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
        ]);

        // upload image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('bathrooms', 'public');
        }

        Bathroom::create($validated);

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
        Bathroom::destroy($id);

        return redirect()->back()->with('success', 'Bathroom deleted successfully!');
    }
}