@extends('layouts.user.details-page')

@section('title')
    <title>{{ $discovery_details->title }}</title>
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

    <!-- ***** Main Banner Details ***** -->
    <section class="page-heading"
        style="background-image: url('{{ asset('storage/images') }}/background/background-banner-main.avif')"
        id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h1 style="text-transform: uppercase">Discovery</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** Discovery Details  ***** -->
    <section class="main-banner-details"
        style="background-image: url('{{ asset('storage/images') }}/background/background-banner-main.avif');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-10 mx-auto">
                    <h2>{{ $discovery_details->title_details }}</h2>
                    <span class="me-2">
                        <strong class="text-light">Author: {{ $discovery_details->author }}</strong>
                    </span>
                    <span class="me-2">
                        <strong class="text-light">Publication
                            Date:{{ \Carbon\Carbon::parse($discovery_details->created_at)->format('d-m-Y') }}
                        </strong>
                    </span>
                    <p class="mt-2">{{ $discovery_details->description_details }}</p>
                    <div class="clearfix mt-lg-0 mt-2">
                        <div class="col-md-6 float-md-end mb-3 ms-md-3 mt-3">
                            <figure class="figure">
                                <img src="{{ asset('storage/images') }}/discovery/{{ $discovery_details->photo }}"
                                    class="img-fluid news-image" alt="{{ $discovery_details->name_photo }}">
                                <figcaption class="figure-caption text-start text-light mt-2">Picture:
                                    {{ $discovery_details->name_photo }}
                                </figcaption>
                            </figure>
                        </div>
                        <p class="mt-2">
                            {{ $discovery_details->content_1 }}
                        </p>
                    </div>
                    <div class="clearfix mt-lg-0 mt-2">
                        <div class="col-md-6 float-md-start me-3 mt-3">
                            <figure class="figure">
                                <img src="{{ asset('storage/images') }}/discovery/{{ $discovery_details->photo_2 }}"
                                    class="img-fluid news-image" alt="{{ $discovery_details->name_photo }}">
                                <figcaption class="figure-caption text-start text-light mt-2">Picture:
                                    {{ $discovery_details->name_photo }}
                                </figcaption>
                            </figure>
                        </div>
                        <p class="mt-2">
                            {{ $discovery_details->content_2 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Discovery Details End ***** -->

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
                                                src="{{ asset('storage/images') }}/planets/{{ $planet->photo_extra }}"
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
