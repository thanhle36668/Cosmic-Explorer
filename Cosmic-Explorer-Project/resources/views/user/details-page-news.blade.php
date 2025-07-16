@extends('layouts.user.details-page')

@section('title')
        <title>{{ $news_details->name }}</title>
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
        style="background-image: url('{{ asset('storage/images') }}/background/background-banner-main.avif')" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2 style="text-transform: uppercase">{{ $news_details->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** News Details  ***** -->
    <section class="main-banner-details"
        style="background-image: url('{{ asset('storage/images') }}/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-self-center">
                    <div>
                        <h4>{{ $news_details->description_short }}</h4>
                    </div>
                    <div class="news_photo" align="center">
                        <img src="{{ asset('storage/images') }}/news/{{ $news_details->photo }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** News Details  End ***** -->

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
                                                src="{{ asset('storage/images') }}/constellations/leo-constellation.jpg"
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
