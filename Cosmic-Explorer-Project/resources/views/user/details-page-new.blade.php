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
                        <h1 style="text-transform: uppercase">Tên tiêu đề</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** Constellation Details  ***** -->
    <section class="section-padding"
        style="background: url('{{ asset('storage/images') }}/background/background-dark.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-10 mx-auto">
                    <h2 class="mb-3">Tên tiêu đề</h2>
                    <span class="me-2">
                        <strong>Author: Linh Nguyễn</strong>
                    </span>
                    <span class="me-2">
                        <strong>Ngày đăng:</strong>
                    </span>
                    <span>
                        <strong>Category: Planet</strong>
                    </span>
                    <p class="mt-2">
                        Below is the translation of the provided Vietnamese text into English, prioritizing clarity and ease
                        of understanding for the reader.

                        The Big Bang: Exploring the Origin of Our Universe
                        Where did our universe begin? The Big Bang is the leading theory, describing the sudden expansion of
                        space and time from an extremely hot, dense point 13.8 billion years ago. This event created
                        everything from subatomic particles to galaxies, explaining the universe's start and evolution.

                        The Big Bang Theory: The Beginning and Development of Our Universe
                        The Big Bang theory is the top scientific model that explains how our universe formed and grew. The
                        term "Big Bang" was actually jokingly made up by astronomer Fred Hoyle in 1949, but it later became
                        the official name for this theory.

                        Starting from a Singular Point
                        According to the Big Bang theory, our universe began from an incredibly hot, dense, and tiny state
                        about 13.8 billion years ago. At that moment, all the universe's energy and matter were thought to
                        be concentrated in a "singularity" – a point with endless density and temperature. This wasn't an
                        explosion in space, but rather the expansion of space itself, carrying matter and energy along with
                        it.

                        Stages of Universe Development
                        Right after the very beginning, the universe went through a series of rapid expansion and cooling
                        phases. These included the Planck Epoch (the first 10
                        −43
                        seconds), the most mysterious stage where our current physics laws might not apply; the Inflationary
                        Epoch (about 10
                        −36
                        to 10
                        −32
                        seconds), when the universe expanded incredibly fast, far exceeding the speed of light; the
                        formation of subatomic particles (around 10
                        −12
                        seconds), as basic particles like quarks and electrons began to form from energy; the formation of
                        protons and neutrons (around 10
                        −6
                        seconds), when quarks combined to make them; Big Bang Nucleosynthesis (from 3 to 20 minutes), where
                        protons and neutrons joined to form the lightest atomic nuclei like hydrogen and helium, along with
                        a tiny bit of lithium; the Recombination Era (around 380,000 years), when electrons combined with
                        hydrogen and helium nuclei to form neutral atoms, making the universe transparent, and the leftover
                        radiation is called the Cosmic Microwave Background (CMB); the Dark Ages (from 380,000 years to
                        about 150 million years), a period where no stars or galaxies had formed, and the universe was
                        mostly neutral hydrogen and helium gas; and finally, the formation of stars and galaxies (from about
                        150 million years ago to today), as gravity caused denser areas of matter to collapse and form the
                        first stars, then galaxies and galaxy clusters.
                    </p>
                    <div class="clearfix my-4 mt-lg-0 mt-5">
                        <div class="col-md-6 float-md-end mb-3 ms-md-3">
                            <figure class="figure">
                                <img src="" class="img-fluid news-image" alt="">
                                <figcaption class="figure-caption text-start">tên ảnh</figcaption>
                            </figure>
                        </div>
                        <p>
                            Evidence Supporting the Big Bang Theory
                            The Big Bang theory is strongly supported by much powerful observational evidence. This includes
                            the
                            expansion of the universe (Hubble's Law), where galaxies are moving away from us, and those
                            farther
                            away are moving faster; the Cosmic Microwave Background (CMB), the "afterglow" from the early
                            universe, discovered in 1964, which is the most convincing proof; the abundance of light
                            elements,
                            as the amounts of hydrogen and helium observed in the universe match the Big Bang theory's
                            predictions; and the formation and distribution of large structures, as computer simulations can
                            successfully recreate how galaxies and galaxy clusters formed and are spread out in the
                            universe.

                            Unanswered Questions
                            While the Big Bang theory has been very successful, there are still some big unanswered
                            questions.
                            These include the nature of dark matter and dark energy, two components that make up most of the
                            universe's energy and matter, but whose true nature remains a mystery; what happened before the
                            Big
                            Bang, as the theory doesn't explain what existed or occurred before that initial point; and how
                            the
                            universe will end, as its future is still not clearly determined.

                            The Big Bang theory continues to be a dynamic field of research, with scientists constantly
                            searching for new evidence to better understand the origin and evolution of our universe.
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
