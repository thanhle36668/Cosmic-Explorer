@extends('layouts.user.cosmic-explorer')

@section('title')
    <title>Cosmic Explorer</title>
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
                            <img src="{{ asset('storage/images') }}/logo.svg" alt="">
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
                            <li>
                                <a href="{{ route('news') }}">News</a>
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

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('collections-constellations') }}"
                                            id="navbarDropdownConstellations">
                                            Constellations
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('collections-observatories') }}"
                                            id="navbarDropdownObservatories">
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

    <!-- ***** Introduction ***** -->
    <section class="main-banner"
        style="background-image: url('{{ asset('storage/images') }}/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text">
                        <h1>COSMIC EXPLORER</h1>
                        <h3>Astronomical information
                            <br class="hidden">
                            about the universe
                        </h3>
                        <p>We are a group of amateur astronomers working together to improve astronomical
                            knowledge and
                            observational skills. We make ourselves and our instruments available to promote public
                            interest in
                            astronomy. Cosmos members are a varied group of colleagues who share a curiosity about the
                            sky. Some
                            members are scientists or engineers, while others are artists or craftspeople, building
                            contractors or
                            college students. Ability levels span the range from novice to expert.</p>
                        <div class="buttons">
                            <div class="border-button">
                                <a href="{{ route('collections-planets') }}">Planet
                                    collections</a>
                            </div>
                            <div class="border-button">
                                <a href="{{ route('collections-constellations') }}" target="_blank">Constellation
                                    collections</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="owl-banner owl-carousel ">
                        @foreach ($planets as $planet)
                            <div class="item">
                                <a href="{{ route('details-planet', $planet->id) }}">
                                    <img class="rounded-circle"
                                        src="{{ asset('storage/images') }}/planets/{{ $planet->photo }}"
                                        alt="{{ $planet->name }}" height="480px" width="480px">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Introduction End ***** -->

    <!-- ***** Discovery (BigBang Theory - The Earth's Evolution - Comets ) ***** -->
    <section class="discovery py-5 px-5" style="background-color: rgb(0,0,0);">
        @foreach ($discovery as $discoveries)
            @if ($discoveries->id % 2 == 0)
                <div class="card px-4 py-4">
                    <div class="row g-0">
                        <div class="col-md-8 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <h5 class="card-title">{{ $discoveries->title }}</h5>
                                <p class="card-text">{{ $discoveries->description_short }}</p>
                                <a href="{{ route('details-discovery', $discoveries->id) }}"
                                    class="card-button badge rounded-pill bg-white">View Details</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('storage/images') }}/discovery/{{ $discoveries->photo }}"
                                class="img-fluid img-discovery" alt="{{ $discoveries->title }}">
                        </div>
                    </div>
                </div>
            @else
                <div class="card px-4 py-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/images') }}/discovery/{{ $discoveries->photo }}" class="img-fluid"
                                alt="{{ $discoveries->title }}">
                        </div>
                        <div class="col-md-8 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <h5 class="card-title">{{ $discoveries->title }}</h5>
                                <p class="card-text">{{ $discoveries->description_short }}</p>
                                <a href="{{ route('details-discovery', $discoveries->id) }}"
                                    class="card-button badge rounded-pill bg-white">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </section>
    <!-- ***** Discovery (BigBang Theory - The Earth's Evolution - Comets ) End ***** -->

    <!-- ***** News ***** -->
    <section class="news"
        style="background-image: url('{{ asset('storage/images') }}/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="news">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>News</h2>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="owl-features owl-carousel">
                                    @foreach ($constellations as $constellation)
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('storage/images') }}/constellations/{{ $constellation->photo }}"
                                                    alt="{{ $constellation->name }}" style="border-radius: 20px;"
                                                    height="360" width="360">
                                                <div class="hover-effect">
                                                    <div class="content">
                                                        <h4>James Webb: Unveiling Cosmic Secrets</h4>
                                                        <span class="details">
                                                            <div class="border-button">
                                                                <a href="#">View Details</a>
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
    <!-- ***** News End ***** -->

    <!-- ***** Collections (Planets - Constellations - Observatories) ***** -->
    <section class="categories-collections"
        style="background: url('{{ asset('storage/images') }}/background/background-collections.jpg')">
        <div class="container">
            <div class="row">
                <!-- ***** Planets Collections ***** -->
                <div class="col-lg-12">
                    <div class="categories">
                        <div class="row">
                            <div class="col-lg-12 mt-0">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Planets Collections</h2>
                                </div>
                            </div>
                            @foreach ($planets as $planet)
                                <div class="col-lg-3 col-sm-6">
                                    <a href="{{ route('details-planet', $planet->id) }}">
                                        <div class="item">
                                            <div class="icon">
                                                <img src="{{ asset('storage/images') }}/planets/{{ $planet->photo }}"
                                                    alt="{{ $planet->name }}">
                                            </div>
                                            <h4>{{ $planet->name }}</h4>
                                            <div class="icon-button">
                                                <a href="{{ route('details-planet', $planet->id) }}"><i
                                                        class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- ***** Planets Collections End ***** -->

                <!-- ***** Constellations Collections ***** -->
                <div class="col-lg-12">
                    <div class="collections">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Constellation Collection</h2>
                                </div>
                            </div>
                            <div class="col-lg-12 carousel">
                                <div class="owl-collection owl-carousel">
                                    @foreach ($constellations as $constellation)
                                        <div class="item">
                                            <img src="{{ asset('storage/images') }}/constellations/{{ $constellation->photo }}"
                                                alt="{{ $constellation->name }}">
                                            <div class="down-content text-center">
                                                <h4>{{ $constellation->name }}
                                                </h4>
                                                <div class="main-button">
                                                    <a href="{{ route('details-constellation', $constellation->id) }}">View
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
                <!-- ***** Constellations Collections End ***** -->

                <!-- ***** Observatories Collections ***** -->
                <div class="col-lg-12">
                    <div class="collections">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Observatories Collection</h2>
                                </div>
                            </div>
                            <div class="col-lg-12 carousel">
                                <div class="owl-collection owl-carousel">
                                    @foreach ($observatories as $observatory)
                                        <div class="item">
                                            <img class="img-observatory"
                                                src="{{ asset('storage/images') }}/observatories/{{ $observatory->photo }}"
                                                alt="{{ $observatory->name }}">
                                            <div class="down-content text-center">
                                                <h4>{{ $observatory->name }}
                                                </h4>
                                                <p>{{ $observatory->location }}</p>
                                                <div class="main-button">
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
                <!-- ***** Observatories Collections End ***** -->

            </div>
            <!-- ***** Constellations Collections End ***** -->
        </div>
    </section>
    <!-- ***** Collections (Planets - Constellations - Observatories) End ***** -->
@endsection
