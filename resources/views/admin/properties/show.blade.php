@extends('layouts.admin')

@section('content')
<div class="container my-5">

    <!-- Property Title -->
    <div class="mb-4">
        <h2 class="fw-bold">{{ $property->title }}</h2>
        <p class="text-muted">
            <i class="bi bi-geo-alt"></i> {{ $property->location ?? 'Location not specified' }}
        </p>
        <p class="text-muted">
            <strong>Status:</strong> {{ $property->availability_status }} |
            <strong>Visibility:</strong> {{ $property->visibility_status }}
        </p>
        <p class="text-muted">
            <strong>Owner:</strong> {{ $property->user ? $property->user->name : 'N/A' }}
        </p>
    </div>

    <div class="row">
        <!-- Property Image -->
        <div class="col-md-7">
            <img src="{{ $property->image ? asset('storage/'.$property->image) : 'https://via.placeholder.com/700x400' }}" 
                 class="d-block w-100 rounded" 
                 style="height: 400px; object-fit: cover;">
        </div>

        <!-- Property Info -->
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body">

                    <h3 class="text-primary mb-3">
                        ${{ number_format($property->price, 2) }}
                    </h3>

                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item">
                            🏠 Type: {{ $property->property_type }}
                        </li>
                        <li class="list-group-item">
                            📋 Availability: {{ $property->availability_status }}
                        </li>
                        <li class="list-group-item">
                            👁 Visibility: {{ $property->visibility_status }}
                        </li>
                        @if(isset($property->bedrooms))
                        <li class="list-group-item">
                            🛏 Bedrooms: {{ $property->bedrooms }}
                        </li>
                        @endif
                        @if(isset($property->bathrooms))
                        <li class="list-group-item">
                            🛁 Bathrooms: {{ $property->bathrooms }}
                        </li>
                        @endif
                        @if(isset($property->area))
                        <li class="list-group-item">
                            📐 Area: {{ $property->area }} sqm
                        </li>
                        @endif
                    </ul>

                    <a href="{{ $property->link ?? '#' }}" target="_blank" class="btn btn-success w-100 mb-2">
                        Visit Property Link
                    </a>

                    <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-secondary w-100">
                        Back to Listings
                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- Description -->
    @if($property->description)
    <div class="mt-5">
        <h4 class="fw-bold">Description</h4>
        <p class="text-muted">
            {{ $property->description }}
        </p>
    </div>
    @endif

</div>
@endsection