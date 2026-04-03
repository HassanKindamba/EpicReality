<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Agent;
use App\Models\Testimonial;
use App\Models\Property;
use App\Models\Home;


use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
{
    // Chukua data zote za homes
    $homes = Home::all();

    // Chukua services 6 pekee
    $services = Service::take(6)->get();

    // Chukua agents 3 pekee
    $agents = Agent::take(3)->get();

    // Chukua latest 6 testimonials
    $testimonials = Testimonial::latest()->take(6)->get();

    // Tuma zote kwenye view
    return view('frontend.index', compact('homes','services', 'agents','testimonials'));
}
    public function about()
    {
        return view('frontend.about');
    }

    public function services()
    {
    $services = Service::all(); // inatoa zote services kutoka DB
    return view('frontend.services', compact('services'));
    }
    
    public function agents()
{
    $agents = Agent::all(); // inatoa agents wote kutoka DB
    return view('frontend.agents', compact('agents'));
}


    public function properties()
{
    $properties = Property::latest()->get();

    return view('frontend.properties', compact('properties'));
}
    public function contact()
    {
        return view('frontend.contact');
    }
}
