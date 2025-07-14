@extends('layouts.user.details-page')

@section('title')
    <title>{{ $planet_details->name }} Planet</title>
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
                                <a href="#">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCollections"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Collections </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownCollections">

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('collections-planets') }}"
                                            id="navbarDropdownPlanets">
                                            Planets
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#"
                                            id="navbarDropdownConstellations" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="true">
                                            Constellations
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#"
                                            id="navbarDropdownObservatories" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="true">
                                            Observatories
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
                                        <a class="dropdown-item" href="#">Videos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Books</a>
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
    <div class="page-heading" style="background-image: url('{{ asset('images') }}/background/background-banner-main.avif')"
        id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h1 style="text-transform: uppercase">{{ $planet_details->name }} Planet</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** Details Planet ***** -->
    <section class="main-banner-details"
        style="background-image: url('{{ asset('images') }}/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text">
                        <h2>{{ $planet_details->name }}</h2>
                        <ul class="info-list">
                            <li><strong>Discovery Date:</strong> {{ $planet_details->discovery_date }}</li>
                            <li><strong>Size (Diameter):</strong> {{ $planet_details->diameter_km }}</li>
                            <li><strong>Average Distance to Earth:</strong> {{ $planet_details->avg_distance_to_earth_km }}
                            </li>
                            <li><strong>Average Distance to the Sun:</strong> {{ $planet_details->avg_distance_to_sun_km }}
                            </li>
                        </ul>
                        <p id="overflowTest">{{ $planet_details->brief_intro_composition }}</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="owl-banner owl-carousel ">
                        <div class="item">
                            <img class="rounded-circle" src="{{ asset('images') }}/planets/{{ $planet_details->photo }}"
                                alt="" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-circle" src="{{ asset('images') }}/planets/{{ $planet_details->photo_2 }}"
                                alt="" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-circle" src="{{ asset('images') }}/planets/{{ $planet_details->photo_3 }}"
                                alt="" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-circle" src="{{ asset('images') }}/planets/{{ $planet_details->photo_4 }}"
                                alt="" height="480px" width="480px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Details Planet End ***** -->

    <!-- ***** Planet Collections ***** -->
    <section class="categories-collections" style="background-color: black">
        <div class="container">
            <div class="row">
                <!-- ***** planets Collections ***** -->
                <div class="col-lg-12">
                    <div class="collections">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Planet Collection</h2>
                                </div>
                            </div>
                            <div class="col-lg-12 carousel">
                                <div class="owl-collection owl-carousel">
                                    @foreach ($planets as $planet)
                                        <div class="item">
                                            <img class="img-planet"
                                                src="{{ asset('images') }}/planets/{{ $planet->photo_extra }}"
                                                alt="{{ $planet->name }}">
                                            <div class="down-content-discovery text-center p-3"
                                                style="background-color: transparent; border: none">
                                                <div class="main-button mt-0 mb-0">
                                                    <a href="{{ route('details-planet', $planet->id) }}">View
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** planets Collections End ***** -->
            </div>
            <!-- ***** planets Collections End ***** -->
        </div>
    </section>
    <!-- ***** Planet Collections End ***** -->
@endsection
