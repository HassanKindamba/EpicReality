@extends('layouts.admin')

@section('content')

<div class="container py-5">

    {{-- Welcome Card --}}
    <div class="card border-0 shadow-lg rounded-4 mb-5">
        <div class="card-body p-5">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>
                    <h1 class="display-4 fw-bold">
                        <span class="text-dark">Epic</span>
                        <span class="text-success">Reality</span>
                    </h1>

                    <p class="lead text-secondary mt-3">
                        Welcome back, Agent 👋
                    </p>

                    <p class="text-muted">
                        Manage your properties, bedrooms, bathrooms and property images easily.
                    </p>
                </div>

                <div>
                    <i class="fas fa-user-tie text-success" style="font-size: 100px;"></i>
                </div>

            </div>

        </div>
    </div>

    {{-- Statistics --}}
    <!-- <div class="row g-4 mb-5">

        {{-- Total Properties --}}
        <div class="col-md-4">
            <div class="card border-0 shadow rounded-4 h-100">
                <div class="card-body text-center p-4">

                    <div class="mb-3">
                        <i class="fas fa-home fa-3x text-success"></i>
                    </div>

                    <h5 class="fw-bold">My Properties</h5>

                    <h2 class="fw-bold text-success">
                        {{ $properties->count() }}
                    </h2>

                </div>
            </div>
        </div>

        {{-- Bedrooms --}}
        <div class="col-md-4">
            <div class="card border-0 shadow rounded-4 h-100">
                <div class="card-body text-center p-4">

                    <div class="mb-3">
                        <i class="fas fa-bed fa-3x text-primary"></i>
                    </div>

                    <h5 class="fw-bold">Bedrooms</h5>

                    <h2 class="fw-bold text-primary">
                        {{ $bedrooms ?? 0 }}
                    </h2>

                </div>
            </div>
        </div>

        {{-- Bathrooms --}}
        <div class="col-md-4">
            <div class="card border-0 shadow rounded-4 h-100">
                <div class="card-body text-center p-4">

                    <div class="mb-3">
                        <i class="fas fa-bath fa-3x text-danger"></i>
                    </div>

                    <h5 class="fw-bold">Bathrooms</h5>

                    <h2 class="fw-bold text-danger">
                        {{ $bathrooms ?? 0 }}
                    </h2>

                </div>
            </div>
        </div>

    </div> -->

    {{-- Quick Actions --}}
    <!-- <div class="card border-0 shadow rounded-4 mb-5">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <h4 class="fw-bold mb-3">
                    Quick Actions
                </h4>

                <a href="" class="btn btn-success rounded-pill px-4 py-2">
                    <i class="fas fa-plus-circle"></i>
                    Add Property
                </a>

            </div>

        </div>
    </div> -->

    {{-- Property List --}}
    <!-- <div class="card border-0 shadow rounded-4">
        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                My Properties
            </h4>

            <div class="row">

                @forelse($properties as $property)

                    <div class="col-md-6 col-lg-4 mb-4">

                        <div class="card border-0 shadow-sm rounded-4 h-100">

                            @if($property->image)
                                <img src="{{ asset('storage/' . $property->image) }}"
                                     class="card-img-top rounded-top-4"
                                     style="height: 220px; object-fit: cover;">
                            @endif

                            <div class="card-body">

                                <h5 class="fw-bold">
                                    {{ $property->name }}
                                </h5>

                                <p class="text-muted small">
                                    {{ Str::limit($property->description, 80) }}
                                </p>

                                <h4 class="text-success fw-bold">
                                    ${{ number_format($property->price) }}
                                </h4>

                            </div>

                            <div class="card-footer bg-white border-0 pb-4">

                                <div class="d-flex gap-2">

                                    <a href="" class="btn btn-dark w-100 rounded-pill">
                                        Edit
                                    </a>

                                    <a href="" class="btn btn-outline-danger w-100 rounded-pill">
                                        Delete
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="text-center py-5">

                        <i class="fas fa-home fa-4x text-secondary mb-3"></i>

                        <h4>No Properties Found</h4>

                        <p class="text-muted">
                            Start by adding your first property.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>
    </div> -->

</div>

@endsection