<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        return view('admin.homes.index', compact('homes'));
    }

    public function create()
    {
        return view('admin.homes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'eneo' => 'required',
            'jengo' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $home = new Home;

        $home->address = $request->address;
        $home->eneo   = $request->eneo;
        $home->jengo  = $request->jengo;

        if ($request->hasFile('image')) {
            $home->image = $request->file('image')->store('homes', 'public');
        }

        $home->save();

        return redirect()->route('admin.homes.index')
                         ->with('success', 'Home added successfully.');
    }

    public function edit(Home $home)
    {
        return view('admin.homes.edit', compact('home'));
    }

    public function show($id)
    {
        $home = Home::findOrFail($id);
        return view('admin.homes.show', compact('home'));
    }

    public function update(Request $request, Home $home)
    {
        $request->validate([
            'address' => 'required',
            'eneo' => 'required',
            'jengo' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Futa picha ya zamani
            if ($home->image) {
                Storage::disk('public')->delete($home->image);
            }

            $home->image = $request->file('image')->store('homes', 'public');
        }

        $home->address = $request->address;
        $home->eneo   = $request->eneo;
        $home->jengo  = $request->jengo;

        $home->save();

        return redirect()->route('admin.homes.index')
                         ->with('success', 'Home updated successfully.');
    }

    public function destroy(Home $home)
    {
        if ($home->image) {
            Storage::disk('public')->delete($home->image);
        }

        $home->delete();

        return redirect()->route('admin.homes.index')
                         ->with('success', 'Home deleted successfully.');
    }
}