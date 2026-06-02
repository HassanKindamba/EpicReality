<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return Property::with(['images', 'bedrooms', 'bathrooms'])->latest()->get();
    }

    public function show($id)
    {
        return Property::with(['images', 'bedrooms', 'bathrooms'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $property = $request->user()->properties()->create([
            'title' => $request->title,
            'price' => $request->price,
            'location' => $request->location,
            'description' => $request->description
        ]);

        return response()->json($property);
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return response()->json($property);
    }

    public function destroy($id)
    {
        Property::destroy($id);

        return response()->json(['message' => 'Imefutwa']);
    }

    public function myProperties(Request $request)
    {
        return $request->user()
            ->properties()
            ->with(['images', 'bedrooms', 'bathrooms'])
            ->get();
    }
}