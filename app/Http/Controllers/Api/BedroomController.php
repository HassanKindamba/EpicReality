<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BedroomController extends Controller
{
    public function store(Request $request, $propertyId)
    {
        $bedroom = Bedroom::create([
            'property_id' => $propertyId,
            'name' => $request->name,
            'size' => $request->size
        ]);

        return response()->json($bedroom);
    }
}
