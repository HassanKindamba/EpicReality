<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Agent;


use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
{
    // Chukua services 6 pekee
    $services = Service::take(6)->get();

    // Chukua agents 3 pekee
    $agents = Agent::take(3)->get();

    // Tuma zote kwenye view
    return view('frontend.index', compact('services', 'agents'));
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
        return view('frontend.properties');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
