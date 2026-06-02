<?php



use App\Models\User;
use App\Models\Property;

class AdminDashboardController extends Controller
{
    public function stats()
    {
        return response()->json([
            'total_users' => User::count(),
            'agents' => User::where('role', 'agent')->count(),
            'properties' => Property::count(),
            'latest_properties' => Property::latest()->take(5)->get()
        ]);
    }
}