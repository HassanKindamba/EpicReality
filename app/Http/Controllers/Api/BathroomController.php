<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BathroomController extends Controller
{
    public function store(Request $request, $propertyId)
    {
        $bathroom = Bathroom::create([
            'property_id' => $propertyId,
            'type' => $request->type
        ]);

        return response()->json($bathroom);
    }
}
