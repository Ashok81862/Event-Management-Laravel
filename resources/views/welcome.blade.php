@extends('frontend.layout')

@section('content')

  <!-- ======= Hero Section ======= -->
  @include('sections.hero')
  <!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    @include('sections.about')
    <!-- End About Section -->

    <!-- ======= Schedules Section ======= -->
    @include('sections.schedule')
    <!-- End Values Section -->

    <!-- ======= Counts Section ======= -->
    @include('sections.counts')
    <!-- End Counts Section -->

    <!-- ======= Events Section ======= -->
    @include('sections.events')
    <!-- End Services Section -->

    <!-- ======= Pricing Section ======= -->
    @include('sections.price')
    <!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    @include('sections.faq')
    <!-- End F.A.Q Section -->

    <!-- ======= Gallery Section ======= -->
    @include('sections.gallery')
    <!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    @include('sections.venue')
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    @include('sections.speakers')
    <!-- End Team Section -->


    @include('sections.sponsors')

    <!-- ======= Contact Section ======= -->
    @include('sections.contact')
    <!-- End Contact Section -->

  </main><!-- End #main -->

@endsection


