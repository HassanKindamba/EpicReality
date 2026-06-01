@extends('layouts.frontend')

@section('title', $property->title)

@section('content')

<main class="main">

{{-- HERO SECTION --}}
<section class="property-hero">

    <div class="hero-overlay"></div>

    @if($property->images->count())
    <img src="{{ asset('storage/' . $property->images->first()->image_path) }}"
         alt="{{ $property->title }}"
         class="hero-image">
    @endif

    <div class="hero-content container">

        <span class="property-badge">
            {{ $property->availability_status }}
        </span>

        <h1>
            {{ $property->title }}
        </h1>

        <p class="hero-location">
            📍 {{ $property->location }}
        </p>

        <div class="hero-meta">

            <div class="meta-box">
                <span>Property Type</span>
                <strong>{{ $property->property_type }}</strong>
            </div>

            <div class="meta-box">
                <span>Bedrooms</span>
                <strong>{{ $property->bedrooms->count() }}</strong>
            </div>

            <div class="meta-box">
                <span>Bathrooms</span>
                <strong>{{ $property->bathrooms->count() }}</strong>
            </div>

            <div class="meta-box">
                <span>Price</span>
                <strong>TZS {{ number_format($property->price) }}</strong>
            </div>

        </div>

    </div>

</section>

{{-- MAIN CONTENT --}}
<section class="property-section">

<div class="container">

    <div class="row g-4">

        {{-- LEFT CONTENT --}}
        <div class="col-lg-8">

            {{-- DESCRIPTION --}}
            <div class="custom-card mb-5">

                <h2 class="section-title">
                    Property Description
                </h2>

                <p class="description-text">
                    {{ $property->description }}
                </p>

            </div>

            {{-- BEDROOMS --}}
            <div class="mb-5">

                <div class="section-header">
                    <h2>Bedrooms</h2>
                </div>

                <div class="row">

                    @forelse($property->bedrooms as $bedroom)

                        <div class="col-md-6 mb-4">

                            <div class="room-card">

                                @if($bedroom->image)
                                    <img src="{{ asset('storage/' . $bedroom->image) }}"
                                         class="room-image">
                                @endif

                                <div class="room-content">

                                    <h4>
                                        {{ $bedroom->name }}
                                    </h4>

                                    <div class="room-details">

                                        <span>📐 {{ $bedroom->size }} sqm</span>
                                        <span>🚪 {{ $bedroom->no_of_doors }} Doors</span>
                                        <span>🪟 {{ $bedroom->no_of_windows }} Windows</span>

                                    </div>

                                    @if($bedroom->price)
                                        <div class="room-price">
                                            TZS {{ number_format($bedroom->price) }}
                                        </div>
                                    @endif

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">
                            <div class="empty-box">
                                No bedrooms available.
                            </div>
                        </div>

                    @endforelse

                </div>

            </div>

            {{-- BATHROOMS --}}
            <div class="mb-5">

                <div class="section-header">
                    <h2>Bathrooms</h2>
                </div>

                <div class="row">

                    @forelse($property->bathrooms as $bathroom)

                        <div class="col-md-6 mb-4">

                            <div class="room-card">

                                @if($bathroom->image)
                                    <img src="{{ asset('storage/' . $bathroom->image) }}"
                                         class="room-image">
                                @endif

                                <div class="room-content">

                                    <h4>
                                        Bathroom #{{ $bathroom->number }}
                                    </h4>

                                    <div class="room-details">

                                        <span>🚿 {{ $bathroom->shower }}</span>
                                        <span>🚪 {{ $bathroom->doors }} Doors</span>
                                        <span>🛁 {{ $bathroom->type }}</span>
                                        <span>📐 {{ $bathroom->area }} sqm</span>

                                    </div>

                                    @if($bathroom->description)
                                        <p class="bath-desc">
                                            {{ $bathroom->description }}
                                        </p>
                                    @endif

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">
                            <div class="empty-box">
                                No bathrooms available.
                            </div>
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

        {{-- SIDEBAR --}}
        <div class="col-lg-4">

            <div class="sidebar-card">

                <h3 class="sidebar-price">
                    TZS {{ number_format($property->price) }}
                </h3>

                <ul class="property-list">

                    <li>
                        <span>Property Type</span>
                        <strong>{{ $property->property_type }}</strong>
                    </li>

                    <li>
                        <span>Status</span>
                        <strong>{{ $property->availability_status }}</strong>
                    </li>

                    <li>
                        <span>Bedrooms</span>
                        <strong>{{ $property->bedrooms->count() }}</strong>
                    </li>

                    <li>
                        <span>Bathrooms</span>
                        <strong>{{ $property->bathrooms->count() }}</strong>
                    </li>

                    <li>
                        <span>Owner</span>
                        <strong>{{ $property->user->name ?? 'N/A' }}</strong>
                    </li>

                </ul>

                <a href="{{ route('contact') }}" class="contact-btn">
                    Contact Agent
                </a>

            </div>

        </div>

    </div>

</div>

</section>

</main>

<style>

.property-hero{
    position: relative;
    height: 60vh;
    min-height: 420px;
    overflow: hidden;
    background: #fff;
}

/* IMAGE CLEAN - NO EFFECTS */
.hero-image{
    position:absolute;
    inset:0;
    width:100%;
    height:100%;
    object-fit: cover;
    object-position:center;
}

/* NO OVERLAY */
.hero-overlay{
    display:none !important;
}

/* CONTENT SIMPLE - NO SHADOWS */
.hero-content{
    position:absolute;
    bottom:30px;
    left:0;
    right:0;
    z-index:2;
    color:#fff;
}

/* OPTIONAL: make text readable WITHOUT shadow (simple background) */
.hero-content h1,
.hero-location,
.property-badge{
    background: rgba(0,0,0,0.35);
    display: inline-block;
    padding: 6px 12px;
    border-radius: 8px;
}

.property-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#16a34a;
    color:white;
    padding:10px 22px;
    border-radius:50px;
    font-size:14px;
    font-weight:600;
    margin-bottom:22px;
    box-shadow:0 10px 20px rgba(22,163,74,0.25);
}

.hero-content h1{
    font-size:65px;
    font-weight:800;
    line-height:1.1;
    margin-bottom:18px;
    max-width:850px;
    text-shadow:0 5px 20px rgba(0,0,0,0.35);
}

.hero-location{
    font-size:19px;
    margin-bottom:35px;
    opacity:0.95;
    font-weight:400;
}

/* =========================================
   HERO META
========================================= */

.hero-meta{
    display:flex;
    flex-wrap:wrap;
    gap:18px;
}

.meta-box{
    background:rgba(255,255,255,0.14);
    border:1px solid rgba(255,255,255,0.15);
    backdrop-filter:blur(6px);
    -webkit-backdrop-filter:blur(6px);
    padding:18px 24px;
    border-radius:18px;
    min-width:170px;
    transition:0.3s ease;
}

.meta-box:hover{
    transform:translateY(-4px);
    background:rgba(255,255,255,0.18);
}

.meta-box span{
    display:block;
    font-size:13px;
    opacity:0.85;
    margin-bottom:8px;
    letter-spacing:0.3px;
}

.meta-box strong{
    font-size:20px;
    font-weight:700;
}

/* =========================================
   MAIN SECTION
========================================= */

.property-section{
    padding:90px 0;
    background:#f5f7fb;
}

/* =========================================
   DESCRIPTION CARD
========================================= */

.custom-card{
    background:white;
    padding:40px;
    border-radius:28px;
    box-shadow:0 12px 35px rgba(0,0,0,0.06);
    border:1px solid rgba(0,0,0,0.03);
}

.section-title{
    font-size:34px;
    margin-bottom:22px;
    font-weight:800;
    color:#111827;
}

.description-text{
    color:#5b6474;
    line-height:2;
    font-size:16px;
}

/* =========================================
   SECTION HEADERS
========================================= */

.section-header{
    margin-bottom:35px;
}

.section-header h2{
    font-size:38px;
    font-weight:800;
    color:#111827;
    position:relative;
    display:inline-block;
}

.section-header h2::after{
    content:'';
    width:70px;
    height:5px;
    background:#16a34a;
    border-radius:20px;
    position:absolute;
    left:0;
    bottom:-12px;
}

/* =========================================
   ROOM CARD
========================================= */

.room-card{
    background:white;
    border-radius:24px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
    transition:all 0.35s ease;
    height:100%;
    border:1px solid rgba(0,0,0,0.03);
}

.room-card:hover{
    transform:translateY(-10px);
    box-shadow:0 18px 40px rgba(0,0,0,0.1);
}

.room-image{
    width:100%;
    height:260px;
    object-fit:cover;
    object-position:center;
}

.room-content{
    padding:28px;
}

.room-content h4{
    font-size:24px;
    font-weight:800;
    margin-bottom:18px;
    color:#111827;
}

.room-details{
    display:flex;
    flex-direction:column;
    gap:12px;
    color:#4b5563;
    font-size:15px;
}

.room-details span{
    background:#f3f4f6;
    padding:10px 14px;
    border-radius:12px;
}

.room-price{
    margin-top:22px;
    color:#16a34a;
    font-size:24px;
    font-weight:800;
}

.bath-desc{
    margin-top:18px;
    color:#6b7280;
    line-height:1.8;
    font-size:15px;
}

/* =========================================
   SIDEBAR
========================================= */

.sidebar-card{
    background:white;
    border-radius:28px;
    padding:38px;
    position:sticky;
    top:120px;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
    border:1px solid rgba(0,0,0,0.03);
}

.sidebar-price{
    font-size:42px;
    color:#16a34a;
    font-weight:800;
    margin-bottom:35px;
    line-height:1.2;
}

.property-list{
    list-style:none;
    padding:0;
    margin:0 0 35px;
}

.property-list li{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px 0;
    border-bottom:1px solid #eceff3;
    gap:20px;
}

.property-list span{
    color:#6b7280;
    font-size:15px;
}

.property-list strong{
    color:#111827;
    font-size:15px;
}

.contact-btn{
    width:100%;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#16a34a;
    color:white;
    text-decoration:none;
    padding:18px;
    border-radius:16px;
    font-weight:700;
    font-size:16px;
    transition:0.3s ease;
    box-shadow:0 10px 25px rgba(22,163,74,0.25);
}

.contact-btn:hover{
    background:#15803d;
    color:white;
    transform:translateY(-3px);
}

/* =========================================
   EMPTY BOX
========================================= */

.empty-box{
    background:white;
    padding:40px;
    border-radius:20px;
    text-align:center;
    color:#6b7280;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
}

/* =========================================
   RESPONSIVE
========================================= */

@media(max-width:992px){

    .property-hero{
        height:78vh;
    }

    .hero-content h1{
        font-size:48px;
    }

    .sidebar-card{
        position:relative;
        top:0;
    }

}

@media(max-width:768px){

    .property-hero{
        height:72vh;
        min-height:550px;
    }

    .hero-content{
        bottom:40px;
    }

    .hero-content h1{
        font-size:34px;
    }

    .hero-location{
        font-size:16px;
    }

    .hero-meta{
        gap:12px;
    }

    .meta-box{
        min-width:140px;
        padding:14px 16px;
    }

    .meta-box strong{
        font-size:17px;
    }

    .property-section{
        padding:60px 0;
    }

    .custom-card{
        padding:28px;
    }

    .section-header h2{
        font-size:30px;
    }

    .sidebar-price{
        font-size:34px;
    }

}

</style>

@endsection