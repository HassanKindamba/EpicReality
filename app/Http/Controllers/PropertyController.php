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

    // List properties all properties for admin, and only owned properties for agents
    public function index()
    {
        if (auth()->user()->role == 'agent') {
            return redirect()->route('admin.properties.agent-index');
        } 
        $properties = Property::all();
        return view('admin.properties.index', compact('properties'));
    }

    // List properties owned by logged-in agent
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
            'description' => 'nullable|string',
            'availability_status' => 'required|in:Available,Occupied,Not In Use',
            'property_type' => 'required|in:Apartment,House,Commercial',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $property = new Property();
        $property->title = $request->title;
        $property->link = $request->link;
        $property->description = $request->description;
        $property->availability_status = $request->availability_status;
        $property->property_type = $request->property_type;
        // $property->visibility_status = $request->visibility_status;
        $property->price = $request->price;
        $property->user_id = Auth::id();

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

    // Show edit visibility form
    public function editVisibility(Property $property)
    {
        if (auth()->user()->role=='agent') {
            abort(403, 'Unauthorized');
        }
        return view('admin.properties.edit-visibility', compact('property'));
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
        'link'  => 'required|url|max:255',
        'description' => 'nullable|string',
        'availability_status' => 'required|in:Available,Occupied,Not In Use',
        'property_type' => 'required|in:Apartment,House,Commercial',
        // 'visibility_status' => 'required|in:Visible,Hidden',
        'price' => 'required|numeric',
        'image' => 'nullable|image|max:2048',
    ]);

    $property->title = $request->title;
    $property->link = $request->link;
    $property->description = $request->description;
    $property->availability_status = $request->availability_status;
    $property->property_type = $request->property_type;
    // $property->visibility_status = $request->visibility_status;
    $property->price = $request->price;

    if ($request->hasFile('image')) {
        $property->image = $request->file('image')->store('properties', 'public');
    }

    $property->save();

    return redirect()->route('admin.properties.index')
                     ->with('success', 'Property updated successfully!');
}

    // Update Visibility property
    public function updateVisibility(Request $request, Property $property)
    {
        if (auth()->user()->role=='agent') {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'visibility_status' => 'required|in:Visible,Hidden',
        ]);

        $property->visibility_status = $request->visibility_status;

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