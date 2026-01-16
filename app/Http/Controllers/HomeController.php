<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

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
    // Validate first
    $request->validate([
        'address' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    // Create manually
    $home = new Home();
    $home->address = $request->address;
    $home->description = $request->description;

    // Handle image if uploaded
    if ($request->hasFile('image')) {
        $home->image = $request->file('image')->store('homes', 'public');
    }

    $home->save();

    return redirect()->route('homes.index')
                     ->with('success', 'Home added successfully');
}



    public function edit(Home $home)
    {
        return view('admin.homes.edit', compact('home'));
    }

    public function update(Request $request, Home $home)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $home->update($request->all());

        return redirect()->route('homes.index')->with('success', 'Home updated successfully.');
    }

    public function destroy(Home $home)
    {
        $home->delete();
        return redirect()->route('homes.index')->with('success', 'Home deleted successfully.');
    }
}
