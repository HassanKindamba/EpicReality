<!-- Register Page -->
@extends('layouts.auth')
@section('content')
    <h2 class="text-2xl font-bold mb-6 text-center">Create Account</h2>

     <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Full Name" class="w-full mb-4 p-3 border rounded-lg">
        <input type="email" name="email" placeholder="Email" class="w-full mb-4 p-3 border rounded-lg">
        <input type="password" name="password" placeholder="Password" class="w-full mb-4 p-3 border rounded-lg">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full mb-4 p-3 border rounded-lg">

        <button class="w-full bg-blue-600 text-white p-3 rounded-lg">Register</button>
    </form>

    <p class="text-sm mt-4 text-center">
        Already have an account?
        <a href="/login" class="text-blue-500">Login</a>
    </p>
@endsection