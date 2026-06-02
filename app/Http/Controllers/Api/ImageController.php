<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImage;

class ImageController extends Controller
{
    public function upload(Request $request, $propertyId)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $property = Property::findOrFail($propertyId);

        $path = $request->file('image')->store('properties', 'public');

        $image = PropertyImage::create([
            'property_id' => $property->id,
            'image' => $path
        ]);

        return response()->json([
            'message' => 'Image uploaded',
            'image' => $image
        ]);
    }

    public function delete($id)
    {
        $img = PropertyImage::findOrFail($id);
        $img->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
