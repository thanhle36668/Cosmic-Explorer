@extends('layouts.user.details-page')

@section('title')
    <title>Tên tiêu đề</title>
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
                        <h1 style="text-transform: uppercase">Tên thể loại</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** Constellation Details  ***** -->
    <section class="section-padding" style="background: url('{{ asset('images') }}/background/background-dark.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-10 mx-auto">
                    <h2 class="mb-3">Tên tiêu đề</h2>
                    <span class="me-2">
                        <strong>Author: Linh Nguyễn</strong>
                    </span>
                    <span>
                        <strong>Category: Planet</strong>
                    </span>
                    <p class="mt-2">
                        Nội dung 1
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                        Risus commodo viverra maecenas accumsan.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                        Risus commodo viverra maecenas accumsan.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                        Risus commodo viverra maecenas accumsan.
                    </p>
                    <div class="clearfix my-4 mt-lg-0 mt-5">
                        <div class="col-md-6 float-md-end mb-3 ms-md-3" data-aos="fade-up">
                            <figure class="figure">
                                <img src="{{ asset('images') }}/constellations/leo-constellation.jpg"
                                    class="img-fluid news-image" alt="">
                                <figcaption class="figure-caption text-start">tên ảnh</figcaption>
                            </figure>
                        </div>
                        <p>
                            Nội dung 2
                            Morbi scelerisque urna in orci elementum, nec mollis ligula luctus. Proin ullamcorper pulvinar
                            commodo. Quisque tortor nunc, ultricies efficitur ex sit amet, tempus rutrum libero. In nec
                            faucibus tellus.
                            Morbi scelerisque urna in orci elementum, nec mollis ligula luctus. Proin ullamcorper pulvinar
                            commodo. Quisque tortor nunc, ultricies efficitur ex sit amet, tempus rutrum libero. In nec
                            faucibus tellus.
                            Morbi scelerisque urna in orci elementum, nec mollis ligula luctus. Proin ullamcorper pulvinar
                            commodo. Quisque tortor nunc, ultricies efficitur ex sit amet, tempus rutrum libero. In nec
                            faucibus tellus.
                            Morbi scelerisque urna in orci elementum, nec mollis ligula luctus. Proin ullamcorper pulvinar
                            commodo. Quisque tortor nunc, ultricies efficitur ex sit amet, tempus rutrum libero. In nec
                            faucibus tellus.
                            Morbi scelerisque urna in orci elementum, nec mollis ligula luctus. Proin ullamcorper pulvinar
                            commodo. Quisque tortor nunc, ultricies efficitur ex sit amet, tempus rutrum libero. In nec
                            faucibus tellus.
                            Morbi scelerisque urna in orci elementum, nec mollis ligula luctus. Proin ullamcorper pulvinar
                            commodo. Quisque tortor nunc, ultricies efficitur ex sit amet, tempus rutrum libero. In nec
                            faucibus tellus.
                            Morbi scelerisque urna in orci elementum, nec mollis ligula luctus. Proin ullamcorper pulvinar
                            commodo. Quisque tortor nunc, ultricies efficitur ex sit amet, tempus rutrum libero. In nec
                            faucibus tellus.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** Constellation Details  End ***** -->

    <!-- ***** Constellation Collections ***** -->
    <!-- ***** Constellation Collections End ***** -->
@endsection
