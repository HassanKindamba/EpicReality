@extends('layouts.frontend')

@section('title','Home-EpicReality')

@section('content')
<body class="index-page">

  
  <main class="main">

   <!-- Hero Section -->
<section id="hero" class="hero section dark-background">

  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

    @foreach($homes as $key => $home)
      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
        
        @if($home->image)
          <img src="{{ asset('storage/'.$home->image) }}" alt="">
        @else
          <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
        @endif

        <div class="carousel-container">
          <div>
            <p>{{ $home->address }}</p>
            <h2>
              <span>{{ $home->eneo }}</span> {{ $home->jengo }}
            </h2>
            <a href="#" class="btn-get-started">View Property</a>
          </div>
        </div>

      </div>
    

<style>
  #hero .carousel-container h2 {
    font-size: 40px;
    max-width: 750px;
    margin: 0 auto;
  }

  #hero .carousel-container p {
    font-size: 18px;
  }
</style>

    @endforeach

    <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

    <ol class="carousel-indicators"></ol>

  </div>

</section>
<!-- /Hero Section -->


    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">


<div class="row gy-4">
    @if($services->count())
        @foreach($services as $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative text-start p-3"> <!-- text-start for left alignment -->

                    <!-- Icon: only show if uploaded by admin of a system -->
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

    <!-- Agents Section -->
    <section id="agents" class="agents section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Agents</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">


@forelse($agents as $agent)
<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="member d-flex flex-column" style="height: 100%;">

        <!-- Picha kwanza -->
        <div class="pic">
            <img 
                src="{{ $agent->photo ? asset('storage/' . $agent->photo) : asset('assets/img/team/default.jpg') }}" 
                class="img-fluid" 
                alt="{{ $agent->name }}">
        </div>

        <!-- Spacer ili malaya (info) ishuke mwisho kabisa -->
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

    </section><!-- /Agents Section -->

    <!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Testimonials</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div>

  <div class="container d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
    <!-- Swiper Slider -->
    <div class="swiper testimonials-slider" style="max-width: 900px;">
      <div class="swiper-wrapper">
        @foreach($testimonials as $item)
        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <p>{{ $item->message }}</p>
            <div class="profile mt-auto">
              @if($item->image)
                <img src="{{ asset('storage/'.$item->image) }}" class="testimonial-img" alt="{{ $item->name }}">
              @else
                <img src="assets/img/testimonials/default.jpg" class="testimonial-img" alt="{{ $item->name }}">
              @endif
              <h3>{{ $item->name }}</h3>
              <h4>{{ $item->position }}</h4>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Swiper Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- Swiper JS -->
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".testimonials-slider", {
    slidesPerView: 1.5,
    spaceBetween: 20,
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 3000,  // Automatic slide kila 3 sekunde
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      768: { slidesPerView: 2, spaceBetween: 30 },
      1200: { slidesPerView: 3, spaceBetween: 40 },
    },
    on: {
      init: function() { updateFadedSlides(this); },
      slideChange: function() { updateFadedSlides(this); },
    },
  });

  function updateFadedSlides(swiper) {
    swiper.slides.forEach(slide => slide.classList.remove('prev-slide', 'next-slide', 'active-slide'));
    const activeIndex = swiper.activeIndex;
    const total = swiper.slides.length;

    const activeSlide = swiper.slides[activeIndex];
    activeSlide.classList.add('active-slide');

    const prevSlide = swiper.slides[activeIndex - 1 < 0 ? total - 1 : activeIndex - 1];
    const nextSlide = swiper.slides[activeIndex + 1 >= total ? 0 : activeIndex + 1];

    prevSlide.classList.add('prev-slide');
    nextSlide.classList.add('next-slide');
  }
</script>


<!-- Custom CSS -->
<style>
  .testimonial-item {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    text-align: center;
    transition: transform 0.4s, opacity 0.4s;
  }

  .testimonial-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 12px;
  }

  .stars i {
    color: #ffb400;
  }

  .swiper-slide {
    opacity: 0.3;
    transform: scale(0.85);
    transition: transform 0.4s, opacity 0.4s;
  }

  .swiper-slide.active-slide {
    opacity: 1;
    transform: scale(1);
  }

  .swiper-slide.prev-slide,
  .swiper-slide.next-slide {
    opacity: 0.5;
    transform: scale(0.9);
  }

  .swiper {
    padding-top: 20px;
    padding-bottom: 30px;
  }
</style>





  </main>
</body>
@endsection