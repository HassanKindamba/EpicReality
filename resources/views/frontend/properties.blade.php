@extends('layouts.frontend')

@section('title','Properties-EpicReality')

@section('content')

<main class="main">

    <!-- PAGE TITLE -->
    <div class="page-title" data-aos="fade">

        <div class="heading">
            <div class="container">

                <div class="row justify-content-center text-center">

                    <div class="col-lg-8">

                        <h1 class="fw-bold">Properties</h1>

                        <p class="mb-0 text-muted">
                            Discover amazing modern properties with beautiful bedrooms,
                            bathrooms and premium living spaces.
                        </p>

                    </div>

                </div>

            </div>
        </div>

        <!-- BREADCRUMBS -->
        <nav class="breadcrumbs">

            <div class="container">

                <ol>
                    <li>
                        <a href="{{ url('/') }}" class="active">
                            Home
                        </a>
                    </li>

                    <li class="current">
                        Properties
                    </li>
                </ol>

            </div>

        </nav>

    </div>
    <!-- END PAGE TITLE -->


    <!-- PROPERTIES -->
    <section class="py-5">

        <div class="container">

            <div class="row g-4">

                @forelse($properties as $property)

                    <div class="col-lg-4 col-md-6">

                        <div class="property-card h-100">

                            <!-- IMAGE -->
                            <div class="property-image-wrapper">

                                @if($property->images->count())

                                    <img src="{{ asset('storage/'.$property->images->first()->image_path) }}"
                                        alt="{{ $property->title }}"
                                        class="property-img">

                                @else

                                    <img src="{{ asset('assets/img/properties/property-1.jpg') }}"
                                        alt="{{ $property->title }}"
                                        class="property-img">

                                @endif

                                <!-- STATUS BADGE -->
                                <div class="property-badge">
                                    {{ $property->availability_status }}
                                </div>

                            </div>

                            <!-- CONTENT -->
                            <div class="property-content">

                                <h3 class="property-title">

                                    <a href="{{ route('properties.details', $property->id) }}">
                                        {{ $property->title }}
                                    </a>

                                </h3>

                                <!-- LOCATION -->
                                <p class="property-location">
                                    📍 {{ $property->location }}
                                </p>

                                <!-- DESCRIPTION -->
                                <p class="property-description">
                                    {{ Str::limit($property->description, 90) }}
                                </p>

                                <!-- PRICE -->
                                <div class="property-price">

                                    TZS {{ number_format($property->price) }}

                                </div>

                                <!-- META -->
                                <div class="property-meta">

                                    <div class="meta-item">
                                        🏠 {{ $property->property_type }}
                                    </div>

                                    <div class="meta-item">
                                        🛏 {{ $property->bedrooms->count() }}
                                    </div>

                                    <div class="meta-item">
                                        🛁 {{ $property->bathrooms->count() }}
                                    </div>

                                </div>

                                <!-- BUTTON -->
                                <a href="{{ route('properties.details', $property->id) }}"
                                   class="view-btn">

                                    View Details

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">

                        <div class="py-5">

                            <h3>No Properties Found</h3>

                            <p class="text-muted">
                                Properties will appear here soon.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

</main>


<!-- FULL PAGE CSS -->
<style>

/* PAGE */
.page-title{
    background: #f8f9fa;
    padding-top: 40px;
}

.heading h1{
    font-size: 42px;
    font-weight: 700;
}

.heading p{
    font-size: 16px;
}

/* PROPERTY CARD */
.property-card{
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: 0.3s ease;
    height: 100%;
}

.property-card:hover{
    transform: translateY(-8px);
}

/* IMAGE */
.property-image-wrapper{
    position: relative;
    overflow: hidden;
}

.property-img{
    width: 100%;
    height: 260px;
    object-fit: cover;
    transition: 0.4s ease;
}

.property-card:hover .property-img{
    transform: scale(1.05);
}

/* BADGE */
.property-badge{
    position: absolute;
    top: 15px;
    right: 15px;
    background: #198754;
    color: #fff;
    padding: 6px 14px;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 600;
}

/* CONTENT */
.property-content{
    padding: 22px;
}

.property-title{
    margin-bottom: 10px;
    font-size: 22px;
    font-weight: 700;
}

.property-title a{
    color: #111;
    text-decoration: none;
}

.property-title a:hover{
    color: #198754;
}

/* LOCATION */
.property-location{
    color: #777;
    margin-bottom: 12px;
    font-size: 14px;
}

/* DESCRIPTION */
.property-description{
    color: #555;
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 20px;
}

/* PRICE */
.property-price{
    font-size: 24px;
    font-weight: 700;
    color: #198754;
    margin-bottom: 20px;
}

/* META */
.property-meta{
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 20px;
}

.meta-item{
    background: #f5f5f5;
    padding: 8px 10px;
    border-radius: 10px;
    font-size: 13px;
    text-align: center;
    flex: 1;
}

/* BUTTON */
.view-btn{
    display: inline-block;
    width: 100%;
    text-align: center;
    background: #198754;
    color: #fff;
    padding: 12px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}

.view-btn:hover{
    background: #146c43;
    color: #fff;
}

/* MOBILE */
@media(max-width:768px){

    .property-img{
        height: 220px;
    }

    .property-title{
        font-size: 20px;
    }

}

</style>

@endsection