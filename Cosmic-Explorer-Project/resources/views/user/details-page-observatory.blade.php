@extends('layouts.user.details-page')

@section('title')
        <title>{{ $observatory_details->name }}</title>S
@endsection

@section('section-change')
    <!-- ***** Header ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ asset('images') }}/logo.svg" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->

                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">About</a>
                            </li>
                            <li>
                                <a href="{{ route('all-news') }}">News</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCollections"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Collections </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownCollections">

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('collections-planets') }}"
                                            id="navbarDropdownPlanets">
                                            Planet
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('collections-constellations') }}"
                                            id="navbarDropdownConstellations">
                                            Constellation
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('collections-observatories') }}"
                                            id="navbarDropdownObservatories">
                                            Observatory
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown educational">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Educational
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('collections-books') }}">Books</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('collections-videos') }}">Videos</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header End ***** -->

    <!-- ***** Main Banner Details ***** -->
    <section class="page-heading" style="background: url('{{ asset('images') }}/background/background-banner-main.avif')"
        id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h1 style="text-transform: uppercase">{{ $observatory_details->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** Observatory Details  ***** -->
    <section class="main-banner-details"
        style="background: url('{{ asset('images') }}/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text">
                        <h2>{{ $observatory_details->name }}</h2>
                        <ul class="info-list">
                            <li><strong>Location: </strong> {{ $observatory_details->location }}</li>
                            <li><strong>Altitude and Advantage: </strong>{{ $observatory_details->altitude_meters }}</li>
                            <li><strong>Established: </strong>{{ $observatory_details->established_year }}
                            </li>
                            <li><strong>Managing Organization: </strong>{{ $observatory_details->managing_organization }}
                            </li>
                            <li><strong>Main Instruments: </strong>{{ $observatory_details->main_instruments }}
                            </li>
                            <li><strong>Primary Research: </strong>{{ $observatory_details->primary_research_areas }}
                            </li>
                            <li><strong>Public Access: </strong>{{ $observatory_details->public_access_info }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="container">
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-12 text-center">
                                <img src="{{ asset('images') }}/observatories/{{ $observatory_details->photo }}"
                                    alt="{{ $observatory_details->name }}" class="img-fluid img-main rounded shadow-sm"
                                    id="parent">
                            </div>
                        </div>
                        <div class="row justify-content-center g-2 person">
                            <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                                <img src="{{ asset('images') }}/observatories/{{ $observatory_details->photo }}"
                                    class="img-fluid rounded shadow-sm person1 active-thumbnail"
                                    alt="{{ $observatory_details->name }}">
                            </div>
                            <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                                <img src="{{ asset('images') }}/observatories/{{ $observatory_details->photo_2 }}"
                                    class="img-fluid rounded shadow-sm person2" alt="{{ $observatory_details->name }}">
                            </div>
                            <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                                <img src="{{ asset('images') }}/observatories/{{ $observatory_details->photo_3 }}"
                                    class="img-fluid rounded shadow-sm person3" alt="{{ $observatory_details->name }}">
                            </div>
                            <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                                <img src="{{ asset('images') }}/observatories/{{ $observatory_details->photo_4 }}"
                                    class="img-fluid rounded shadow-sm person4" alt="{{ $observatory_details->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- ***** Observatory Details  End ***** -->

    <!-- ***** Observatory Collections ***** -->
    <section class="col-lg-12" style="background: url('{{ asset('images') }}/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="news">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Observatory Collections</h2>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="owl-features owl-carousel">
                                    @foreach ($observatories as $observatory)
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('images') }}/observatories/{{ $observatory->photo }}"
                                                    alt="{{ $observatory->name }}" style="border-radius: 20px;"
                                                    height="360" width="360">
                                                <div class="hover-effect">
                                                    <div class="content">
                                                        <h4 class="mb-1">{{ $observatory->name }}</h4>
                                                        <p>{{ $observatory->location }}</p>
                                                        <span class="details">
                                                            <div class="border-button">
                                                                <a
                                                                    href="{{ route('details-observatory', $observatory->slug) }}">View
                                                                    Details</a>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Observatory Collections End ***** -->

    <!-- ***** Contact ***** -->
    <section class="contact" style="background: url('{{ asset('images') }}/background/background-dark.jpg')">
        <div class="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div id="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3694.5308998533724!2d106.7116196747655!3d10.806685889343925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529ed00409f09%3A0x11f7708a5c77d777!2zQXB0ZWNoIENvbXB1dGVyIEVkdWNhdGlvbiAtIEjhu4cgVGjhu5FuZyDEkMOgbyB04bqhbyBM4bqtcCBUcsOsbmggVmnDqm4gUXXhu5FjIHThur8gQXB0ZWNo!5e1!3m2!1svi!2s!4v1751729317282!5m2!1svi!2s"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-heading">
                            <h2>Say Hello. Don't Be Shy!</h2>
                        </div>
                        <form id="contact" action="{{ route('send-message') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input name="sender_name" type="text" id="name" placeholder="Your name"
                                            required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input name="sender_email" type="text" id="email"
                                            placeholder="Your email" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message" placeholder="Your message" required></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-dark-button"><i
                                                class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="section-heading">
                            <h2>By Subscribing To Our Newsletter</h2>
                        </div>
                        <form id="subscribe" action="" method="get">
                            <div class="row">
                                <div class="col-lg-5">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Your Name"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-5">
                                    <fieldset>
                                        <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                            placeholder="Your Email Address" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-2">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-dark-button"><i
                                                class="fa fa-paper-plane"></i></button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li>School Location:<br><span>35/6 D5 Street, Ward 25, Binh Thanh, Ho Chi Minh City
                                            72308, Vietnam</span></li>
                                    <li>Website:<br><span><a
                                                href="https://aptechvietnam.com.vn/">aptechvietnam.com.vn</a></span></li>
                                    <li>Phone:<br><span>+84 1800 1779</span></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul>
                                    <li>Work Hours:<br><span>07:30 AM - 10:00 PM Daily (Except Sunday)</span></li>
                                    <li>Email:<br><span>aptech2@aprotrain.com</span></li>
                                    <li>Social Media:<br><span><a
                                                href="https://www.facebook.com/AptechVNLearning/">Facebook</a>, <a
                                                href="https://www.instagram.com/aptechvn.official/">Instagram</a>, <a
                                                href="https://www.tiktok.com/@aptechvn.official">Tiktok</a>,
                                            <a href="https://www.youtube.com/user/aprotrainaptechvn">Youtube</a></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact End ***** -->
@endsection

@section('script-changeImageAndSetActive')
    <script type="text/javascript">
        $(document).ready(function() {
            function changeImageAndSetActive(thumbnailElement) {
                var imgSrc = $(thumbnailElement).attr("src");
                $("#parent").attr("src", imgSrc);
                $(".person img").removeClass("active-thumbnail");
                $(thumbnailElement).addClass("active-thumbnail");
            }

            $(".person img").click(function() {
                changeImageAndSetActive(this);
            });
        });
    </script>
@endsection
