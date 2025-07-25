@extends('layouts.user.cosmic-explorer')

@section('title')
    <title>Constellations Collections</title>
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
                            <img src="{{ asset('images') }}/logo.svg" alt="Logo">
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
    <div class="page-heading" style="background-image: url('{{ asset('images') }}/background/background-banner-main.avif')"
        id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h1 style="text-transform: uppercase">Constellations Collections</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** Collections Constellations ***** -->
    <section id="collections" class="px-3">
        <div class="container">
            <div class="space-y-5 mt-5 mx-auto" style="max-width: 1000px;">
                @foreach ($constellations as $constellation)
                    <div id="{{ $constellation->name }}"
                        class="card p-4 rounded-lg shadow-lg scroll-margin-top-120 d-md-flex flex-md-row align-items-md-center gap-5"
                        style="height: auto">
                        <div class="flex-grow-1">
                            <h3>{{ $constellation->name }}</h3>
                            <p class="text-light lh-lg mb-3">
                                {{ $constellation->identification }}
                            </p>
                            <div class="main-button">
                                <a href="{{ route('details-constellation', $constellation->id) }}">View
                                    Details</a>
                            </div>
                        </div>
                        <div
                            class="planet-image-fixed-size d-flex align-items-center justify-content-center overflow-hidden mb-2">
                            <img src="{{ asset('images') }}/constellations/{{ $constellation->photo }}"
                                alt="{{ $constellation->name }}" class="img-fluid rounded-lg">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="pagination-links mt-4 mb-4">
            {{ $constellations->links('pagination::bootstrap-5') }}
        </div>
    </section>
    <!-- ***** Collections Planets End ***** -->
@endsection
