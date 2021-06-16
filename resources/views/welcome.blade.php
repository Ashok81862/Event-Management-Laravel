
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Conference</title>

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body data-spy="scroll" data-target="#site-nav">
    <nav id="site-nav" class="navbar navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header">

                <!-- logo -->
                <div class="site-branding">
                    <a class="logo" href="index.html">

                        <!-- logo image  -->
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">

                        Conference
                    </a>
                </div>

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- /.navbar-header -->

            <div class="collapse navbar-collapse" id="navbar-items">
                <ul class="nav navbar-nav navbar-right">

                    <!-- navigation menu -->
                    <li class="active"><a data-scroll href="#about">About</a></li>
                    <li><a data-scroll href="#speakers">Speakers</a></li>
                    <li><a data-scroll href="#schedule">Schedule</a></li>
                    <li><a data-scroll href="#partner">Partner</a></li>
                    <!-- <li><a data-scroll href="#">Sponsorship</a></li> -->
                    <li><a data-scroll href="#faq">FAQ</a></li>
                    <li><a data-scroll href="#photos">Photos</a></li>

                </ul>
            </div>
        </div><!-- /.container -->
    </nav>

    <header id="site-header" class="site-header valign-center">
        <div class="intro">

            <h2>25 April, 2015 / Townhall California</h2>

            <h1>Freelancer Conference 2015</h1>

            <p>First &amp; Largest Conference</p>

            <a class="btn btn-white" data-scroll href="#registration">Register Now</a>

        </div>
    </header>

    <section id="about" class="section about">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">

                    <h3 class="section-title">About Us</h3>

                    <p>You've inspired new consumer, racked up click-thru's, blown-up brand enes. We can't give you back the weekends you worked, or erase the pain ebeing forced to make the logo bigger. But if you submit your best work we ajusts might be able to give the chance to show you best digital marketing.</p>

                    <figure>
                        <img alt="" class="img-responsive" src="assets/images/about-us.jpg">
                    </figure>

                </div><!-- /.col-sm-6 -->

                <div class="col-sm-6">

                    <h3 class="section-title multiple-title">What is Our Goal?</h3>

                    <p>You've inspired new consumer, racked up click-thru's, blown-up brand enes. We can't give you back the weekends you worked, or erase the pain ebeing forced to make the logo bigger. But if you submit your best work we ajusts might be able to give the chance to show you best digital marketing.</p>

                    <ul class="list-arrow-right">

                        <li>Learn from the best Asian Social Media Experts &amp; Case Studies</li>
                        <li>Have dedicated 2-to-1 meetings with the experts</li>
                        <li>Reach more consumers for less by learning new digital media skills</li>
                        <li>Save money when spending in online advertising</li>

                    </ul>

                </div><!-- /.col-sm-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <section id="facts" class="section bg-image-1 facts text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                    <i class="ion-ios-calendar"></i>
                    <h3>{{$schedule_count }}<br>Events</h3>

                </div>
                <div class="col-sm-3">

                    <i class="ion-ios-location"></i>
                    <h3>California<br>USA</h3>

                </div>
                <div class="col-sm-3">

                    <i class="ion-pricetags"></i>
                    <h3>150<br>Tickets</h3>

                </div>
                <div class="col-sm-3">

                    <i class="ion-speakerphone"></i>
                    <h3>{{ $speaker_count}}<br>Speakers</h3>

                </div>
            </div><!-- row -->
        </div><!-- container -->
    </section>

    <section id="speakers" class="section speakers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h3 class="section-title">Speakers</h3>

                </div>
            </div>

            <div class="row">
                @foreach ($speakers as $speaker)
                <div class="col-md-4">

                    <div class="speaker">

                        <figure>
                            @if($speaker->media_id)
                            <img alt="" class="img-responsive center-block" src="/storage/{{ $speaker->media->path }}">
                            @endif
                        </figure>

                        <h4>{{ $speaker->name }}</h4>

                        <p>{{ $speaker->title }}</p>

                        <ul class="social-block">
                            <li><a href="{{ $speaker->twitter }}"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="{{ $speaker->facebook }}"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="{{$speaker->instagram }}"><i class="ion-social-instagram"></i></a></li>
                        </ul>

                    </div>
                </div>
                @endforeach
            </div><!-- /.row -->
        </div>
    </section>

    <section id="registration" class="section registration">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Registration &amp; Pricing</h3>
                </div>
            </div>

            <form action="#" id="registration-form">
                <div class="row">
                    <div class="col-md-12" id="registration-msg" style="display:none;">
                        <div class="alert"></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname" required>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone" id="cell" name="cell" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Address" id="address" name="address" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Zip Code" id="zip" name="zip" required>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="city" id="city" required>
                                <option readonly>City</option>
                                <option>City Name 1</option>
                                <option>City Name 2</option>
                                <option>City Name 3</option>
                                <option>City Name 4</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="program" id="program" required>
                                <option readonly>Select Your Program</option>
                                <option>Program Name 1</option>
                                <option>Program Name 2</option>
                                <option>Program Name 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center mt20">
                    <button type="submit" class="btn btn-black" id="registration-submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <section id="contribution" class="section bg-image-2 contribution">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-uppercase mt0 font-400">Submit Your Contribution Work</h3>

                    <p>You've inspired new consumer, racked up click-thru's, blown-up brand awareness. We can't give you back the weekends you worked, or erase the pain of being forced to make the logo bigger. But if you submit your best work.</p>

                    <a class="btn btn-white" href="#">Submit</a>
                </div>
            </div>
        </div>
    </section>

    <section id="schedule" class="section schedule">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Event Schedule</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($schedules as $schedule)
                <div class="col-md-4 col-sm-6">
                    <div class="schedule-box">
                        <div class="time">
                            <time datetime="{{ $schedule->start_date}}"></time>
                        </div>
                        <h3>{{ $schedule->title }}</h3>
                        <p>{{ $schedule->speaker->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
    </section>

    <section id="partner" class="section partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Event Partner</h3>
                </div>
            </div>
            <div class="row">
                @foreach($sponsors as $sponsor)
                    @if($sponsor->media_id)
                    <div class="col-sm-3">
                        <a class="partner-box partner-box-6">
                            <img alt="" class="img-responsive center-block" src="/storage/{{ $sponsor->media->path }}"/>
                        </a>
                    </div>
                    @endif
                @endforeach
            </div>
    </section>

    <section id="faq" class="section faq">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Event FAQs</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        @foreach ($faqs as $faq)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="faq-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">{{ $faq->question }}</a>
                                    </h4>
                                </div>

                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p>{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>

    <section id="photos" class="section photos">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Photos</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="grid">
                        @foreach ($galleries as $gallery )
                            @if($gallery->media_id)
                            <li class="grid-item grid-item-sm-3">
                                <img alt="" class="img-responsive center-block" src="/storage/{{ $gallery->media->path }}">
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="location" class="section location">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h3 class="section-title">Head Office</h3>
                    <address>
                        <p>Eardenia<br> The Grand Hall<br> House # 08, Road #52, Street<br> Phone: +1159t3764<br> Email: example@mail.com</p>
                    </address>
                </div>
                <div class="col-sm-9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96706.50013548559!2d-78.9870674333782!3d40.76030630398601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sbd!4v1436299406518" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="social-block">
                        <li><a href=""><i class="ion-social-twitter"></i></a></li>
                        <li><a href=""><i class="ion-social-facebook"></i></a></li>
                        <li><a href=""><i class="ion-social-linkedin-outline"></i></a></li>
                        <li><a href=""><i class="ion-social-googleplus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- script -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/smooth-scroll/dist/js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
</body>
</html>
