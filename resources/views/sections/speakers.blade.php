<section id="team" class="team">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Team</h2>
        <p>Our Speakers</p>
      </header>

      <div class="row gy-4">

        @foreach ($speakers as $speaker)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="/storage/{{ $speaker->media->path }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="{{ $speaker->twitter }}"><i class="bi bi-twitter"></i></a>
                  <a href="{{ $speaker->facebook }}"><i class="bi bi-facebook"></i></a>
                  <a href="{{ $speaker->instagram }}"><i class="bi bi-instagram"></i></a>
                  <a href="{{ $speaker->email }}"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{ $speaker->name }}</h4>
                <span>{{ $speaker->title }}</span>
                <p>{{ $speaker->body }}</p>
              </div>
            </div>
          </div>
        @endforeach

      </div>

    </div>

  </section>
