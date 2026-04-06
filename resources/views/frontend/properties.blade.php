@extends('layouts.frontend')

@section('title','Properties-Epicreality')

@section('content')
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Properties</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ url('/') }}" class="active">Home</a></li>
            <li class="current">Properties</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->


  <div class="row">
  @foreach($properties as $property)
  <div class="col-xl-4 col-md-6 mb-4" data-aos="fade-up">
    <div class="property-card">
      {{-- Property Image --}}
      @if($property->image)
        <img src="{{ asset('storage/'.$property->image) }}" 
             alt="{{ $property->title }}" 
             class="property-img">
      @else
        <img src="assets/img/properties/property-4.jpg" 
             alt="{{ $property->title }}" 
             class="property-img">
      @endif

      {{-- Overlay with info --}}
      <div class="property-overlay">
          <h3>
            <a href="#" class="stretched-link">{{ $property->title }}</a>
          </h3>

      {{-- Description --}}
        <p class="mb-1 small">
          {{ Str::limit($property->description, 60) }}
        </p>

      {{-- Property Meta --}}
        <div class="property-meta">
          <span><b>Type:</b> {{ $property->property_type }}</span><br>
          <span><b>Status:</b> {{ $property->availability_status }}</span><br>
          <span><b>Price:</b> ${{ number_format($property->price) }}</span>
        </div>

        {{-- Static property details --}}
        <div class="property-info d-flex justify-content-between">
          <div>Area</div>
          <div>Beds</div>
          <div>Baths</div>
          <div>Garages</div>
        </div>
        <div class="property-info d-flex justify-content-between">
          <div>350</div>
          <div>4</div>
          <div>5</div>
          <div>1</div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

<style>
.property-card {
  position: relative;
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
}

.property-card:hover {
  transform: translateY(-5px);
}

.property-img {
  width: 100%;
  height: 380px; /* Ongeza kidogo kutoka 350px -> 380px */
  object-fit: cover;
  display: block;
}

/* Gradient overlay at bottom */
.property-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 15px;
  /* Overlay kubwa, inakaa chini kabisa na inapanda juu zaidi */
  background: linear-gradient(to top, rgba(0, 5, 9, 0.9) 0%, rgba(0, 102, 204, 0) 300%);
  color: #fff;
}



.property-overlay h3 {
  margin: 5px 0 10px;
  font-size: 1.1rem;      /* Punguza font-size kidogo */
  font-weight: 400;       /* Punguza unene kidogo (normal) */
}

.property-info {
  font-size: 0.8rem;      /* Punguza font-size kidogo */
  margin-top: 8px;
  font-weight: 400;       /* Punguza unene kidogo */
}

.property-info div {
  flex: 1;
  text-align: center;
}
</style>

