@extends('layouts.frontend')

@section('title','Agents-EpicReality')

@section('content')
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Agents</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ url('/') }}" class="active">Home</a></li>
            <li class="current">Agents</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title Contents -->

    <!-- Agents Section -->
    <section id="agents" class="agents section">

      <div class="container">

        <div class="row gy-5">

@forelse($agents as $agent)
<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="member d-flex flex-column" style="height: 100%;">

        <!-- Agents photo -->
        <div class="pic">
            <img 
                src="{{ $agent->photo ? asset('storage/' . $agent->photo) : asset('assets/img/team/default.jpg') }}" 
                class="img-fluid" 
                alt="{{ $agent->name }}">
        </div>

        <!-- Spacer ili ya (info) ishuke mwisho kabisa -->
        <div class="mt-auto member-info text-center">
            <h4>{{ $agent->name }}</h4>
            <span>{{ $agent->phone }}</span><br>
            <span>{{ $agent->email }}</span><br>
            <p>{{ Str::limit($agent->description, 60) }}</p>

            <div class="social mt-2">
                <a href="tel:{{ $agent->phone }}">
                    <i class="bi bi-telephone"></i>
                </a>

                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $agent->phone) }}" target="_blank">
                    <i class="bi bi-whatsapp"></i>
                </a>
            </div>
        </div>

    </div>
</div>
@empty
<p class="text-center">No agents available right now.</p>
@endforelse

        </div>

      </div>

    </section><!-- /End of Agents Section -->

  </main>
@endsection