 <!-- Preloader Start -->
 <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <strong>Hotel</b>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
       <div class="header-area header-sticky">
            <div class="main-header ">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                               <a href="{{ route('client.index') }}"><img src="{{ asset('frontend/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                    <div class="col-xl-8 col-lg-8">
                            <!-- main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">                                                                                                                                     
                                        <li><a href="{{ route('client.index') }}">Home</a></li>
                                        {{-- <li><a href="#">My Flight</a></li> --}}
                                        <li><a href="#trip">Trip Plans</a></li>
                                        <li><a href="{{ route('client.feedbackDetails') }}">Feedback</a> </li>
                                        
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>             
                        <div class="col-xl-2 col-lg-2">
                            <!-- header-btn -->
                            <div class="header-btn">
                                @guest
                                <a href="{{ url('/login') }}" class="btn btn1 d-none d-lg-block ">Login </a>
                                @else
                                <span class="btn btn1 d-none d-lg-block ">{{Auth::user()->name}}</span>
                                <span>
                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); 
                                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </span>
                                @endguest
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
        <!-- Header End -->
    </header>