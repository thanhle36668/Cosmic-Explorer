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
                    <h2>{{ $observatory_details->name }}</h2>
                    <ul class="info-list">
                        <li><strong>Location:</strong> {{ $observatory_details->location }}</li>
                        <li><strong>Altitude and Advantage:</strong>{{ $observatory_details->altitude_meters }}</li>
                        <li><strong>Established:</strong>{{ $observatory_details->established_year }}
                        </li>
                        <li><strong>Managing Organization:</strong>{{ $observatory_details-> managing_organization }}
                        </li>
                        <li><strong>Main Instruments:</strong>{{ $observatory_details-> main_instruments }}
                        </li>
                        <li><strong>Primary Research:</strong>{{ $observatory_details-> primary_research_areas }}
                        </li>
                        <li><strong>Public Access:</strong>{{ $observatory_details-> public_access_info }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="owl-banner owl-carousel ">
                    <div class="item">
                        <img class="rounded-3" src="{{ asset('images') }}/observatories/{{$observatory_details->photo}}"
                            alt="{{ $observatory_details->name }}" height="480px" width="480px">
                    </div>
                    <div class="item">
                        <img class="rounded-3" src="{{ asset('images') }}/observatories/{{$observatory_details->photo_2}}"
                            alt="{{ $observatory_details->name }}" height="480px" width="480px">
                    </div>
                    <div class="item">
                        <img class="rounded-3" src="{{ asset('images') }}/observatories/{{$observatory_details->photo_3}}"
                            alt="{{ $observatory_details->name }}" height="480px" width="480px">
                    </div>
                    <div class="item">
                        <img class="rounded-3" src="{{ asset('images') }}/observatories/{{$observatory_details->photo_4}}"
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
                                        src="{{ asset('images') }}/observatories/{{$observatory->photo}}"
                                        alt="{{ $observatory->name }}">
                                    <div class="down-content p-3" style="background-color: #282B2F;">
                                        <div class="main-button main-button-observatory text-center">
                                            <h4 class="mb-2">{{$observatory->name}}</h4>
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