<!-- Register Page -->
@extends('layouts.auth')
@section('content')
<h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full mb-4 p-3 border rounded-lg">
        <input type="password" name="password" placeholder="Password" class="w-full mb-4 p-3 border rounded-lg">

        <button class="w-full bg-green-600 text-white p-3 rounded-lg">Login</button>
    </form>

    <p class="text-sm mt-4 text-center">
        <a href="/forgot-password" class="text-blue-500">Forgot Password?</a>
    </p>
@endsection