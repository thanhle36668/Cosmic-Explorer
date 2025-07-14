@extends('layouts.user.details-page')

@section('title')
    @if ($observatory_details->observatories)
        <title>{{ $observatory_details->name }}</title>
    @else
        <title>{{ $observatory_details->name }} Observatory</title>
    @endif
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
    <section class="page-heading"
        style="background-image: url('{{ asset('images') }}/background/background-banner-main.avif')" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        @if ($observatory_details->observatories)
                            <h1 style="text-transform: uppercase">{{ $observatory_details->name }}</h1>
                        @else
                            <h1 style="text-transform: uppercase">{{ $observatory_details->name }} Observatory</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** Observatory Details  ***** -->
    <section class="main-banner-details"
        style="background-image: url('{{ asset('images') }}/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text">
                        <h2>Paranal</h2>
                        <ul class="info-list">
                            <li><strong>Location:</strong> Atacama Desert, Chile</li>
                            <li><strong>Altitude and Advantage:</strong>2,635 meters. Good height combined with extremely
                                dry climate, ideal for both optical and infrared with nearly cloudless skies</li>
                            <li><strong>Established:</strong>Began operations in 1999
                            </li>
                            <li><strong>Managing Organization:</strong>Run by ESO
                            </li>
                            <li><strong>Main Instruments:</strong>Very Large Telescope (VLT), 4x 8.2-meter telescopes (can
                                be combined)
                            </li>
                            <li><strong>Primary Research:</strong>Exoplanets, black holes, galaxies, cosmology. It's
                                especially successful in directly imaging distant planets and tracking stars moving around
                                the supermassive black hole at our galaxy's center
                            </li>
                            <li><strong>Public Access:</strong>Offers free guided tours on Saturdays (registration required)
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="owl-banner owl-carousel ">
                        <div class="item">
                            <img class="rounded-3" src="{{ asset('images') }}/observatories/Paranal-Observatory.jpg"
                                alt="{{ $observatory_details->name }}" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-3" src="{{ asset('images') }}/observatories/Paranal-Observatory-2.jpg"
                                alt="{{ $observatory_details->name }}" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-3" src="{{ asset('images') }}/observatories/Paranal-Observatory-3.jpg"
                                alt="{{ $observatory_details->name }}" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-3" src="{{ asset('images') }}/observatories/Paranal-Observatory-4.jpg"
                                alt="{{ $observatory_details->name }}" height="480px" width="480px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Observatory Details  End ***** -->

    <!-- ***** Observatory Collections ***** -->
    <section class="categories-collections" style="background-color: black">
        <div class="container">
            <div class="row">
                <!-- ***** Observatories Collections ***** -->
                <div class="col-lg-12">
                    <div class="collections">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Observatory Collection</h2>
                                </div>
                            </div>
                            <div class="col-lg-12 carousel">
                                <div class="owl-collection owl-carousel">
                                    @foreach ($observatories as $observatory)
                                        <div class="item">
                                            <img class="img-observatory"
                                                src="{{ asset('images') }}/observatories/Paranal-Observatory.jpg"
                                                alt="{{ $observatory->name }}">
                                            <div class="down-content p-3" style="background-color: #282B2F;">
                                                <div class="main-button main-button-observatory text-center">
                                                    <h4 class="mb-2">Paranal</h4>
                                                    <a href="{{ route('details-observatory', $observatory->id) }}">View
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
    <!-- ***** Observatory Collections End ***** -->
@endsection
