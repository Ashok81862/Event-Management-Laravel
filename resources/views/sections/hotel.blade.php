<section id="hotels" class="team">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Our Hotels</p>
      </header>

        <div class="row gy-4">
                @foreach ($hotels as $hotel)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                    <div class="member-img">
                        <img src="/storage/{{ $hotel->media->path }}" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4>{{ $hotel->name }}</h4>
                        <span>{{ $hotel->address }}</span>
                        <p>{{ $hotel->body }}</p>
                    </div>
                    </div>
                </div>
                @endforeach
        </div>

    </div>

  </section>

