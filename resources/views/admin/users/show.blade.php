@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>User Details</h2>

    <div class="card">
        <div class="card-body">

            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>

            @if($user->photo)
            <p><strong>Photo:</strong></p>
            <img src="{{ asset('storage/' . $user->photo) }}" 
                 style="max-width:200px; max-height:200px; object-fit:cover;" 
                 class="rounded shadow">
            @endif

        </div>
    </div>

    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">
        ← Back
    </a>
</div>
@endsection