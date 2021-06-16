<section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Frequently Asked Questions</p>
      </header>

      <div class="row">
        <div class="col-lg-12">
          <div class="accordion accordion-flush" id="faqlist1">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $faq->id }}">
                        {{ $faq->question }}
                    </button>
                    </h2>
                    <div id="faq-content-{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                    <div class="accordion-body">
                        {{ $faq->answer }}
                    </div>
                    </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>

  </section>
