<section id="venues" class="services">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Our Venues</p>
      </header>

      <div class="row gy-4">

        @foreach ($venues as $venue)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              @if ($venue->media_id)
              <img src="/storage/{{ $venue->media->path }}" class="img-fluid mb-2" alt="">
              @endif
              <h3>{{ $venue->name }}</h3>
              <p>Address- {{ $venue->address }}</p>
              <p>{{ $venue->body }}</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        @endforeach

      </div>

    </div>

  </section>
