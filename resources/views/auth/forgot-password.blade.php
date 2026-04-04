<!-- Register Page -->
@extends('layouts.auth')
@section('content')
<h2 class="text-2xl font-bold mb-6 text-center">Reset Password</h2>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" class="w-full mb-4 p-3 border rounded-lg">

        <button class="w-full bg-yellow-500 text-white p-3 rounded-lg">Send Reset Link</button>
    </form>
@endsection