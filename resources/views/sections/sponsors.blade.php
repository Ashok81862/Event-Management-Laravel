<!-- ======= Sponsors Section ======= -->
<section id="clients" class="clients">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Our Sponsors</p>
      </header>

      <div class="clients-slider swiper-container">
        <div class="swiper-wrapper align-items-center">
          @foreach ($sponsors as $sponsor)
            <div class="swiper-slide"><img src="/storage/{{ $sponsor->media->path }}" class="img-fluid" alt="">
            {{-- <p>{{ $sponsor->name }}</p> --}}
            </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

  </section><!-- End Clients Section -->
