<section id="galleries" class="portfolio">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Check our Gallery</p>
      </header>
      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
       @foreach ($galleries as $gallery)
           @if($gallery->media_id)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="/storage/{{$gallery->media->path }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{ $gallery->name }}</h4>
                        <div class="portfolio-links">
                        <a href="/storage/{{$gallery->media->path }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $gallery->name }}"><i class="bi bi-plus"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
           @endif
       @endforeach
      </div>



    </div>

  </section>
