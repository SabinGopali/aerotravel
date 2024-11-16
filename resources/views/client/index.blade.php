@extends('client.layout.master')

@section('body')
<main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active dot-style">
                <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="{{ asset('frontend/img/hero/mmm.jpg') }}" >
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9">
                                <div class="h1-slider-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".4s">The Sky is Yours, Let’s Book It!</h1>
                                    <h3 data-animation="fadeInDown" data-delay=".4s">Scroll Down to Search Now!</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="{{ asset('frontend/img/hero/rhino.jpg') }}" >
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9">
                                <div class="h1-slider-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".4s">The Sky is Yours, Let’s Book It!</h1>
                                    <h3 data-animation="fadeInDown" data-delay=".4s">Scroll Down to Search Now!</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg" >
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9">
                                <div class="h1-slider-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".4s">The Sky is Yours, Let’s Book It!</h1>
                                    <h3 data-animation="fadeInDown" data-delay=".4s">Scroll Down to Search Now!</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- slider Area End-->

        <!-- Booking Room Start-->

    <div class="container1">
    <div class="tabs1">
        <div class="tab active1" style="font-size: 19px;">Book A Flight</div>
    </div>

    <form action="{{ route('client.flightlist') }}" method="GET">
        @csrf <!-- CSRF token for form submission -->
        <div class="form-section1">
            <div class="form-group1">
                <label for="from">From ✈️</label>
                <input type="text" id="from1" name="from" placeholder="Your Location" required>
            </div>

            <div class="form-group1">
                <label for="to">To 🛬</label>
                <input type="text" id="to1" name="to" placeholder="Enter Destination" required>
            </div>

            <div class="form-group1">
                <label for="departure">Departure Date 📅</label>
                <input type="date" name="departure" id="departure1" required>
            </div>

            @auth
    @guest

    <p>You are not authorized to book flights.</p>
    @else
        <a href="{{ route('client.flightlist') }}">
            <button type="submit" class="search-btn1">Search Flight(s)</button>
        </a>
    @endguest
@else
    <p>Please <a href="{{ route('login') }}">log in</a> to book a flight.</p>
@endauth

        </div>
    </form>
</div>


        <!-- Make customer Start-->
        <section class="make-customer-area customar-padding fix">
            <div class="container-fluid p-0">
                <div class="row">
                   <div class="col-xl-5 col-lg-6">
                        <div class="customer-img mb-120">
                            <img src="{{ asset('frontend/img/hero/about_image.jpg') }}" class="customar-img1" alt="">
                            <img src="{{ asset('frontend/img/hero/about_image2.jpg') }}" class="customar-img2" alt="">
                            <div class="service-experience heartbeat">
                                <h3>Wings to Your Dream <br>Destinations</h3>
                            </div>
                        </div>
                   </div>
                    <div class=" col-xl-4 col-lg-4">
                        <div class="customer-caption">
                            <span>About our company</span>
                            <h2>"Your Journey Starts Here, Fly Smarter!"</h2>
                            <div class="caption-details">
                                <p class="pera-dtails">Welcome to AeroTravel, your trusted platform for easy and convenient flight bookings.
                                     We are dedicated to helping you find and book flights at the best prices, with options tailored to your needs.
                                     </p>
                                <p>Our system is designed to make flight booking fast and simple. Whether you're planning a vacation, a
                                     business trip, or a last-minute getaway, we’ve got you covered. You can search for flights, compare
                                      prices, and book your tickets in just a few clicks. </p>
                                <a href="#" class="btn more-btn1">Learn More <i class="ti-angle-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Make customer End-->

        <!-- service Start -->
        <section id="trip">
        <section class="room-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <!--font-back-tittle  -->
                        <div class="font-back-tittle mb-45">
                            <div class="archivment-front">
                                <h3>Our Trip Plans</h3>
                            </div>
                            <h3 class="archivment-back">Our Trip Plans</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($travellerdetails as $td)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <!-- Single Room -->
                        <div class="single-room mb-50">
                            <div class="room-img">
                               <a href="rooms.html"><img src="{{ asset('storage/' . $td->destinationimage) }}" alt=""></a>
                            </div>
                            <div class="room-caption">
                                <h3><a href="{{ route('client.tripplandetails', $td->id) }}">{{ $td->tripname }}</a></h3>
                                <div class="per-night">
                                    <span><u></u>Package Cost: {{ $td->packagecost }} <span>/Per Person</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row justify-content-center">
                    <!-- <div class="room-btn pt-70">
                        <a href="#" class="btn view-btn1">View more  <i class="ti-angle-right"></i> </a>
                    </div> -->
                </div>
            </div>

        </section>
        </section>
        <!-- Room End -->


        <!-- Gallery img Start-->
        <div class="gallery-area fix">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gallery-active owl-carousel">
                            <div class="gallery-img">
                                <a href="#"><img src="assets/img/gallery/gallery1.jpg" alt=""></a>
                            </div>
                            <div class="gallery-img">
                                <a href="#"><img src="assets/img/gallery/gallery2.jpg" alt=""></a>
                            </div>
                            <div class="gallery-img">
                                <a href="#"><img src="assets/img/gallery/gallery3.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery img End-->
    </main>

@endsection
