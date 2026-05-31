<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show login page
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        // Try authentication
        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // Check if account is active
            if ($user->status !== 'active') {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Account is pending approval.',
                ]);
            }

            // Check approval
            if ($user->is_approved != 1) {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Account not approved yet.',
                ]);
            }

            // Regenerate session
            $request->session()->regenerate();

            // Role-based redirect
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/agent/dashboard');
        }

        // If login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Logout
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}