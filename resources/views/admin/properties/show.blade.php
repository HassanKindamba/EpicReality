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
            <strong>Owner:</strong> {{ $property->user->name ?? 'N/A' }}
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
                        <li class="list-group-item">🏠 Type: {{ $property->property_type }}</li>
                        <li class="list-group-item">📋 Availability: {{ $property->availability_status }}</li>
                        <li class="list-group-item">👁 Visibility: {{ $property->visibility_status }}</li>

                        <li class="list-group-item">
                            🛏 Bedrooms: {{ $property->bedrooms->count() }}
                        </li>

                        <li class="list-group-item">
                            🛁 Bathrooms: {{ $property->bathrooms->count() }}
                        </li>

                        <li class="list-group-item">
                            📐 Area: {{ $property->area ?? 'N/A' }} sqm
                        </li>
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
        <p class="text-muted">{{ $property->description }}</p>
    </div>
    @endif

    <!-- ================= BEDROOMS ================= -->
    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold">Bedrooms</h4>
            <a href="{{ route('admin.bedrooms.create', $property->id) }}"
               class="btn btn-primary btn-sm">
                Add Bedroom
            </a>
        </div>

        @if($property->bedrooms->count())
            <div class="row">
                @foreach($property->bedrooms as $bedroom)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">

                                <h5 class="card-title">{{ $bedroom->name }}</h5>

                                <p class="mb-1">Size: {{ $bedroom->size }} sqm</p>
                                <p class="mb-1">Doors: {{ $bedroom->no_of_doors }}</p>
                                <p class="mb-1">Windows: {{ $bedroom->no_of_windows }}</p>
                                <p class="mb-1">Area: {{ $bedroom->area }} sqm</p>
                                <p class="mb-1">Price: {{ number_format($bedroom->price, 2) }} TZS</p>

                                @if($bedroom->image)
                                    <img src="{{ asset('storage/'.$bedroom->image) }}"
                                         class="img-fluid mt-2 rounded">
                                @endif

                                <!-- DELETE BEDROOM -->
                                <form action="{{ route('admin.bedrooms.destroy', $bedroom->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this bedroom?')"
                                      class="mt-2">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm w-100">
                                        Delete Bedroom
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">No bedrooms added yet.</p>
        @endif
    </div>

    <!-- ================= BATHROOMS ================= -->
    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold">Bathrooms</h4>

            <a href="{{ route('admin.bathrooms.create', $property->id) }}"
               class="btn btn-primary btn-sm">
                Add Bathroom
            </a>
        </div>

        @if($property->bathrooms->count())
            <div class="row">
                @foreach($property->bathrooms as $bathroom)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">

                                <h5 class="card-title">
                                    Bathroom #{{ $bathroom->number }}
                                </h5>

                                <p class="mb-1">Type: {{ $bathroom->type }}</p>
                                <p class="mb-1">Shower: {{ $bathroom->shower }}</p>
                                <p class="mb-1">Doors: {{ $bathroom->doors }}</p>
                                <p class="mb-1">Area: {{ $bathroom->area }} sqm</p>

                                <p class="mb-1 text-muted">
                                    {{ $bathroom->description }}
                                </p>

                                @if($bathroom->image)
                                    <img src="{{ asset('storage/'.$bathroom->image) }}"
                                         class="img-fluid mt-2 rounded">
                                @endif

                                <!-- DELETE BATHROOM -->
                                <form action="{{ route('admin.bathrooms.destroy', $bathroom->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this bathroom?')"
                                      class="mt-2">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm w-100">
                                        Delete Bathroom
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">No bathrooms added yet.</p>
        @endif
    </div>

</div>
@endsection