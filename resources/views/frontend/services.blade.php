@extends('layouts.frontend')

@section('title', 'Serveces-EpicReality')

@section('content')
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Services</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ url('/') }}" class="active">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <div class="container">

        <div class="row gy-4">


<div class="row gy-4">
    @if($services->count())
        @foreach($services as $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative text-start p-3"> <!-- text-start for left alignment -->

                    <!-- Icon: only show if uploaded by admin -->
                    @if($service->icon)
                        <div class="icon mb-3" style="width:50px; height:50px; border-radius:50%; overflow:hidden;">
                            <img 
                                src="{{ asset('storage/' . $service->icon) }}" 
                                alt="{{ $service->name }}" 
                                style="width:100%; height:100%; object-fit:cover;">
                        </div>
                    @endif

                    <!-- Name -->
                    <h3>{{ $service->name }}</h3>

                    <!-- Description -->
                    <p>{{ Str::limit($service->description, 100) }}</p>

                    <!-- Price -->
                    <p>Price: {{ $service->price }} TZS</p>

                    <!-- Link (optional) -->
                    @if($service->link)
                        <a href="{{ $service->link }}" target="_blank" 
                           class="btn btn-sm mt-2" 
                           style="background-color:#28a745; color:white; border:none;">
                           Learn More
                        </a>
                    @endif

                </div>
            </div>
        @endforeach
    @else
        <div class="col-12 text-center">
            <p>No services available right now.</p>
        </div>
    @endif
</div>

        </div>

      </div>

    </section><!-- /Services Section -->

  </main>
@endsection