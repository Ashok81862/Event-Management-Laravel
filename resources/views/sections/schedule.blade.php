<section id="schedules" class="values">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Our Schedule</p>
      </header>

      <div class="row">

        @foreach ($schedules as $schedule)
        <div class="col-lg-4">
            <div class="box" data-aos="fade-up" data-aos-delay="200">
              <h3>{{ $schedule->sub_title }}</h3>
              <p>{{ $schedule->start_date }}</p>
              <p>Speaker "{{ $schedule->speaker->name }}"</p>
            </div>
          </div>
        @endforeach

      </div>

    </div>

  </section>
