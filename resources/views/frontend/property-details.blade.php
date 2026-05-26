@extends('layouts.frontend')

@section('title', $property->title)

@section('content')

<main class="main">

<div class="container py-5">

    {{-- PROPERTY HEADER --}}
    <div class="mb-4">
        <h1 class="fw-bold">
            {{ $property->title }}
        </h1>

        <p class="text-muted">
            📍 {{ $property->location }}
        </p>

        <div class="d-flex gap-3 flex-wrap text-muted">
            <span>🏠 {{ $property->property_type }}</span>
            <span>📌 {{ $property->availability_status }}</span>
            <span>👤 {{ $property->user->name ?? 'N/A' }}</span>
        </div>
    </div>

    {{-- MAIN IMAGE --}}
    <div class="mb-5">
        <img src="{{ asset('storage/' . $property->image) }}"
             class="img-fluid rounded shadow w-100"
             style="height:500px; object-fit:cover;">
    </div>

    {{-- PROPERTY INFO --}}
    <div class="row mb-5">

        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">

                    <h3 class="fw-bold mb-3">Property Description</h3>

                    <p class="text-muted">
                        {{ $property->description }}
                    </p>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body p-4">

                    <h3 class="text-success fw-bold mb-4">
                        TZS {{ number_format($property->price) }}
                    </h3>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            🛏 Bedrooms:
                            <strong>{{ $property->bedrooms->count() }}</strong>
                        </li>

                        <li class="list-group-item">
                            🛁 Bathrooms:
                            <strong>{{ $property->bathrooms->count() }}</strong>
                        </li>

                        <li class="list-group-item">
                            📐 Area:
                            <strong>{{ $property->area ?? 'N/A' }} sqm</strong>
                        </li>

                    </ul>

                </div>
            </div>
        </div>

    </div>

    {{-- BEDROOMS --}}
    <div class="mb-5">

        <h2 class="fw-bold mb-4">Bedrooms</h2>

        <div class="row">

            @forelse($property->bedrooms as $bedroom)

                <div class="col-md-4 mb-4">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        @if($bedroom->image)
                            <img src="{{ asset('storage/' . $bedroom->image) }}"
                                 class="card-img-top"
                                 style="height:220px; object-fit:cover;">
                        @endif

                        <div class="card-body">

                            <h5 class="fw-bold">{{ $bedroom->name }}</h5>

                            <p class="mb-1">📐 {{ $bedroom->size }} sqm</p>
                            <p class="mb-1">🚪 Doors: {{ $bedroom->no_of_doors }}</p>
                            <p class="mb-1">🪟 Windows: {{ $bedroom->no_of_windows }}</p>

                            @if($bedroom->price)
                                <p class="text-success fw-bold">
                                    💰 TZS {{ number_format($bedroom->price) }}
                                </p>
                            @endif

                        </div>

                    </div>

                </div>

            @empty
                <p class="text-muted">No bedrooms available.</p>
            @endforelse

        </div>

    </div>

    {{-- BATHROOMS --}}
    <div class="mb-5">

        <h2 class="fw-bold mb-4">Bathrooms</h2>

        <div class="row">

            @forelse($property->bathrooms as $bathroom)

                <div class="col-md-4 mb-4">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        @if($bathroom->image)
                            <img src="{{ asset('storage/' . $bathroom->image) }}"
                                 class="card-img-top"
                                 style="height:220px; object-fit:cover;">
                        @endif

                        <div class="card-body">

                            <h5 class="fw-bold">
                                Bathroom #{{ $bathroom->number }}
                            </h5>

                            <p class="mb-1">🚿 Shower: {{ $bathroom->shower }}</p>
                            <p class="mb-1">🚪 Doors: {{ $bathroom->doors }}</p>
                            <p class="mb-1">🛁 Type: {{ $bathroom->type }}</p>

                            <p class="mb-1">📐 Area: {{ $bathroom->area }} sqm</p>

                            @if($bathroom->description)
                                <p class="text-muted small">
                                    {{ $bathroom->description }}
                                </p>
                            @endif

                        </div>

                    </div>

                </div>

            @empty
                <p class="text-muted">No bathrooms available.</p>
            @endforelse

        </div>

    </div>

</div>

</main>

@endsection