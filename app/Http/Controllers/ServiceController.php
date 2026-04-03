<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'icon'        => 'nullable|image',
            'link'        => 'nullable|url',
        ]);

        $service = new Service();
        $service->name        = $request->name;
        $service->description = $request->description;
        $service->price       = $request->price;

        // Hifadhi icon kama ime-upload
        if ($request->hasFile('icon')) {
            $service->icon = $request->file('icon')->store('services/icons', 'public');
        }

        $service->link = $request->link; // optional link
        $service->save();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service added successfully!');
    }


    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'icon'        => 'nullable|image',
            'link'        => 'nullable|url',
        ]);

        $service->name        = $request->name;
        $service->description = $request->description;
        $service->price       = $request->price;

        // Hifadhi icon mpya ikiwa ime-upload
        if ($request->hasFile('icon')) {
            $service->icon = $request->file('icon')->store('services/icons', 'public');
        }

        $service->link = $request->link; // optional link
        $service->save();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service updated successfully!');
    }


     // Destroy service
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')
                         ->with('success', 'Service deleted successfully!');
    }
}
