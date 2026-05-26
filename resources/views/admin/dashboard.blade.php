


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
                        Welcome back, Admin 👋
                    </p>

                    <p class="text-muted">
                        Manage users, properties, bedrooms, bathrooms and everything from one dashboard.
                    </p>
                </div>

                <div>
                    <i class="fas fa-building text-success" style="font-size: 100px;"></i>
                </div>

            </div>

        </div>
    </div>

    {{-- Statistics --}}
    <div class="row g-4">

        {{-- Users --}}
        <!-- <div class="col-md-4">
            <div class="card border-0 shadow rounded-4 h-100">
                <div class="card-body text-center p-4">

                    <div class="mb-3">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>

                    <h5 class="fw-bold">Total Users</h5>

                    <h2 class="fw-bold text-primary">
                        {{ $users ?? 0 }}
                    </h2>

                </div>
            </div>
        </div> -->

        {{-- Properties --}}
        <!-- <div class="col-md-4">
            <div class="card border-0 shadow rounded-4 h-100">
                <div class="card-body text-center p-4">

                    <div class="mb-3">
                        <i class="fas fa-home fa-3x text-success"></i>
                    </div>

                    <h5 class="fw-bold">Total Properties</h5>

                    <h2 class="fw-bold text-success">
                        {{ $properties ?? 0 }}
                    </h2>

                </div>
            </div>
        </div> -->

        {{-- Bedrooms --}}
        <!-- <div class="col-md-4">
            <div class="card border-0 shadow rounded-4 h-100">
                <div class="card-body text-center p-4">

                    <div class="mb-3">
                        <i class="fas fa-bed fa-3x text-danger"></i>
                    </div>

                    <h5 class="fw-bold">Total Bedrooms</h5>

                    <h2 class="fw-bold text-danger">
                        {{ $bedrooms ?? 0 }}
                    </h2>

                </div>
            </div>
        </div> -->

    </div>

    {{-- Quick Actions --}}
    <!-- <div class="card border-0 shadow rounded-4 mt-5">
        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                Quick Actions
            </h4>

            <div class="d-flex flex-wrap gap-3">

                <a href="" class="btn btn-success px-4 py-2 rounded-pill">
                    <i class="fas fa-plus-circle"></i>
                    Add Property
                </a>

                <a href="" class="btn btn-dark px-4 py-2 rounded-pill">
                    <i class="fas fa-users"></i>
                    Manage Users
                </a>

                <a href="" class="btn btn-primary px-4 py-2 rounded-pill">
                    <i class="fas fa-list"></i>
                    View Properties
                </a>

            </div>

        </div> -->
    </div>

</div>

@endsection