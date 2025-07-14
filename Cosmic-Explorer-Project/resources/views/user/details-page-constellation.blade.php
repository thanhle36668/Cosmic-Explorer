@extends('layouts.user.details-page')

@section('title')
    <title>Leo Constellation</title>
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
                            <li class="nav-item dropdown planets">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Planets
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($planets as $planet)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('details-planet', $planet->id) }}">{{ $planet->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item dropdown constellations">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Constellations
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($constellations as $constellation)
                                        <li style="width: 100%">
                                            <a class="dropdown-item"
                                                href="{{ route('details-constellation', $constellation->id) }}">{{ $constellation->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item dropdown observatories">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Observatories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($observatories as $observatory)
                                        <li style="width: 100%">
                                            <a class="dropdown-item"
                                                href="{{ route('details-observatory', $observatory->id) }}">{{ $observatory->name }}</a>
                                        </li>
                                    @endforeach
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
                        <h1 style="text-transform: uppercase">Leo Constellation</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** Constellation Details  ***** -->
    <section class="main-banner-details"
        style="background-image: url('{{ asset('images') }}/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="header-text">
                        <h2>Leo (The Lion)</h2>
                        <ul class="info-list">
                            <li>
                                <strong>Identification:</strong>
                                A bright constellation, especially noticeable in the spring sky (March - June) from the
                                Northern Hemisphere. It looks like a reclining lion, clearly identified by the Sickle shape
                                that forms its head and mane
                            </li>
                            <li>
                                <strong>Main Stars:</strong>
                                Regulus: The brightest star, marking the lion's heart. Denebola: The second brightest star,
                                found at the lion's tail
                            </li>
                            <li>
                                <strong>Notable Features:</strong>
                                Notable Features: Home to several interesting galaxies, especially the Leo Triplet (M65,
                                M66, NGC 3628), a group of three beautiful spiral galaxies
                            </li>
                            <li>
                                <strong>Myths & Meaning:</strong>
                                Myths & Meaning: One of the 12 Zodiac constellations. In Greek mythology, it represents the
                                Nemean Lion, defeated by Hercules
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="owl-banner owl-carousel ">
                        <div class="item">
                            <img class="rounded-3" src="{{ asset('images') }}/constellations/leo-constellation.jpg"
                                alt="{{ $constellation_details->name }}" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-3" src="{{ asset('images') }}/constellations/leo-constellation-2.jpg"
                                alt="{{ $constellation_details->name }}" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-3" src="{{ asset('images') }}/constellations/leo-constellation-3.webp"
                                alt="{{ $constellation_details->name }}" height="480px" width="480px">
                        </div>
                        <div class="item">
                            <img class="rounded-3" src="{{ asset('images') }}/constellations/leo-constellation-4.jpg"
                                alt="{{ $constellation_details->name }}" height="480px" width="480px">
                        </div>
                        @if ($constellation_details->photo_5 !== '')
                            <div class="item">
                                <img class="rounded-3"
                                    src="{{ asset('images') }}/constellations/{{ $constellation_details->photo_5 }}"
                                    alt="{{ $constellation_details->name }}" height="480px" width="480px">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Constellation Details  End ***** -->

    <!-- ***** Constellation Collections ***** -->
    <section class="categories-collections" style="background-color: black">
        <div class="container">
            <div class="row">
                <!-- ***** Constellations Collections ***** -->
                <div class="col-lg-12">
                    <div class="collections">
                        <div class="row">
                            <div class="col-lg-12 title">
                                <div class="section-heading">
                                    <div class="line-dec"></div>
                                    <h2>Constellations Collection</h2>
                                </div>
                            </div>
                            <div class="col-lg-12 carousel">
                                <div class="owl-collection owl-carousel">
                                    @foreach ($constellations as $constellation)
                                        <div class="item">
                                            <img class="img-constellation"
                                                src="{{ asset('images') }}/constellations/leo-constellation.jpg"
                                                alt="{{ $constellation->name }}">
                                            <div class="down-content p-3" style="background-color: #282B2F;">
                                                <div class="main-button main-button-constellation text-center">
                                                    <h4 class="mb-2">Leo (The Lion)</h4>
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
            </div>
        </div>
    </section>
    <!-- ***** Constellation Collections End ***** -->
@endsection
