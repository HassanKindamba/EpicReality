@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Home Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Address:</strong> {{ $home->address }}</p>
            <p><strong>Eneo:</strong> {{ $home->eneo }}</p>
            <p><strong>Jengo:</strong> {{ $home->jengo }}</p>

            <p><strong>Photo:</strong></p>
            <img src="{{ asset('storage/' . $home->image) }}" width="300">
        </div>
    </div>

    <a href="{{ route('admin.homes.index') }}" class="btn btn-secondary mt-3">
        Back
    </a>
</div>
@endsection