<!-- Register Page -->
@extends('layouts.auth')
@section('content')
<h2 class="text-2xl font-bold mb-6 text-center">Set New Password</h2>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token ?? '' }}">
        <input type="email" name="email" placeholder="Email" class="w-full mb-4 p-3 border rounded-lg">
        <input type="password" name="password" placeholder="New Password" class="w-full mb-4 p-3 border rounded-lg">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full mb-4 p-3 border rounded-lg">

        <button class="w-full bg-red-600 text-white p-3 rounded-lg">Reset Password</button>
    </form>
@endsection