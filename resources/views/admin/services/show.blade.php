@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Service Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $service->name }}</p>

            <p><strong>Description:</strong> {{ $service->description }}</p>

            <p><strong>Price:</strong> TZS {{ number_format($service->price) }}</p>

            <p><strong>Icon:</strong></p>
            <img src="{{ asset('storage/' . $service->icon) }}" 
                 width="100" 
                 class="mb-3">

            <p><strong>Link:</strong></p>
            <a href="{{ $service->link }}" target="_blank">
                {{ $service->link }}
            </a>
        </div>
    </div>

    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary mt-3">
        Back
    </a>
</div>
@endsection