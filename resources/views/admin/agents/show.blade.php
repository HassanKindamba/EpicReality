@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Agent Details</h2>

    <div class="card">
        <div class="card-body">

            <p><strong>Name:</strong> {{ $agent->name }}</p>
            <p><strong>Email:</strong> {{ $agent->email }}</p>
            <p><strong>Phone:</strong> {{ $agent->phone }}</p>

            <p><strong>Photo:</strong></p>
            <img src="{{ asset('storage/' . $agent->photo) }}" 
                 style="max-width:200px; max-height:200px; object-fit:cover;" 
                 class="rounded shadow">

        </div>
    </div>

    <a href="{{ route('admin.agents.index') }}" class="btn btn-secondary mt-3">
        ← Back
    </a>
</div>
@endsection