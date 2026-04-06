<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bedroom;
use App\Models\Property;

class BedroomController extends Controller
{
    // Display the create bedroom form
    public function create($property_id)
    {
        $property = Property::findOrFail($property_id);
        return view('admin.bedrooms.create', compact('property'));
    }

    // Store bedroom data
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'name' => 'required|string|max:255',
            'size' => 'nullable|numeric',
            'no_of_doors' => 'nullable|integer',
            'no_of_windows' => 'nullable|integer',
            'area' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('bedrooms', 'public');
        }

        Bedroom::create([
            'property_id' => $request->property_id,
            'name' => $request->name,
            'size' => $request->size,
            'no_of_doors' => $request->no_of_doors,
            'no_of_windows' => $request->no_of_windows,
            'area' => $request->area,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.properties.show', $request->property_id)
                         ->with('success', 'Bedroom added successfully.');
    }
}