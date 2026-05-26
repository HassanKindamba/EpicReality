<?php

namespace App\Http\Controllers;

use App\Models\Bathroom;
use App\Models\Property;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgentBathroomController extends Controller
{
    // (optional API)
    public function index()
    {
        return Bathroom::all();
    }

    // Show create form
    public function create($property_id)
    {
        $property = Property::findOrFail($property_id);

        return view('agent.bathrooms.create', compact('property'));
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
            'image' => 'nullable|image|max:2048',
            'area' => 'nullable',
            'description' => 'nullable',

            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // CREATE bathroom
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

        // MAIN IMAGE
        if ($request->hasFile('image')) {
            $bathroom->image = $request->file('image')->store('bathrooms', 'public');
            $bathroom->save();
        }

        // MULTIPLE IMAGES
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
            ->route('agent.properties.show', $validated['property_id'])
            ->with('success', 'Bathroom added successfully!');
    }

    // SHOW SINGLE
    public function show($id)
    {
        $bathroom = Bathroom::findOrFail($id);

        return view('agent.bathrooms.show', compact('bathroom'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $bathroom = Bathroom::findOrFail($id);

        $bathroom->update($request->all());

        return redirect()->back()->with('success', 'Bathroom updated successfully!');
    }

    // DELETE
    public function destroy($id)
    {
        $bathroom = Bathroom::findOrFail($id);

        // delete image kama ipo
        if ($bathroom->image && Storage::disk('public')->exists($bathroom->image)) {
            Storage::disk('public')->delete($bathroom->image);
        }

        $bathroom->delete();

        return redirect()->back()->with('success', 'Bathroom deleted successfully!');
    }
}