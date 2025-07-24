@extends('layouts.user.details-page')

@section('title')
    <title>{{ $post->title }}</title>
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
                                <a href="{{ route('about') }}">About</a>
                            </li>
                            <li>
                                <a href="{{ route('all-news') }}">News</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCollections"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Collections </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownCollections">

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('collections-planets') }}"
                                            id="navbarDropdownPlanets">
                                            Planet
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('collections-constellations') }}"
                                            id="navbarDropdownConstellations">
                                            Constellation
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('collections-observatories') }}"
                                            id="navbarDropdownObservatories">
                                            Observatory
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
                                        <a class="dropdown-item" href="{{ route('collections-books') }}">Books</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('collections-videos') }}">Videos</a>
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
        style="background-image: url('{{ asset('images/background') }}/background-banner-main.avif')" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h1 style="text-transform: uppercase">{{ $post->category->name ?? 'Chưa phân loại' }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Details End ***** -->

    <!-- ***** Constellation Details  ***** -->
    <section class="section-padding" style="background: url('{{ asset('images/background') }}/background-dark.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-10 mx-auto">
                    <h2 class="mb-3">{{ $post->title }}</h2>
                    <p class="mb-3">
                        <strong>Author: {{ $post->user->name ?? 'Ẩn danh' }} </strong>
                        <br>
                        <strong>Category: {{ $post->category->name ?? 'Chưa phân loại' }}</strong>
                        <br>
                        <strong>Ngày đăng: {{ $post->created_at->format('d/m/Y') }}</strong>
                    </p>
                    <p class="mt-2">
                        {{ $post->excerpt }}
                    </p>
                    <div class="clearfix my-4 mt-lg-0 mt-5">
                        <div class="col-md-6 float-md-end mb-3 ms-md-3" data-aos="fade-up">
                            <figure class="figure">
                                Image:
                                @if ($post->image)
                                    <div class="mb-4">
                                        <img src="{{ asset($post->image) }}" class="img-fluid" alt="{{ $post->title }}">
                                    </div>
                                @endif

                            </figure>
                        </div>
                        <p>
                            {!! nl2br(e($post->content)) !!}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- comment -->
    <section
        style="padding-top: 60px; padding-bottom: 60px; background-image: url('{{ asset('images/background') }}/background-banner-main.avif')">
        <!-- Default box -->
        <div class="container">
            <div class="col-lg-8 col-10 mx-auto">
                <div class="row">

                    <div class="col-md-6">

                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">

                            <h2 style="margin-bottom: 30px;">Leave a comment</h2>
                            @if (!Auth::check())
                                <div class="form-group">
                                    <label for="inputName" style="color: azure; margin-bottom: 5px">Name</label>
                                    <input type="text" name="name" id="inputName" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail"
                                        style="color: azure; margin-bottom: 5px; margin-top: 10px">E-Mail</label>
                                    <input type="email" name="email" id="inputEmail" class="form-control" required />
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="inputMessage" style="color: azure; margin-bottom: 5px; margin-top: 10px">Your
                                    comment</label>
                                <textarea name="content" id="inputMessage" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <input style="margin-top: 20px" type="submit" class="btn btn-primary" value="Send">
                            </div>

                        </form>

                    </div>

                    <div class="col-md-6">
                        <h3 style="margin-bottom: 30px">All comments</h3>
                        @forelse ($comments as $comment)
                            <div class="card-body">
                                <strong class="text-info">{{ $comment->user->name ?? $comment->name }}</strong>
                                <p>{{ $comment->content }}</p>
                                <small class="text-secondary">{{ $comment->created_at->format('d/m/Y H:i') }}</small>
                            </div>
                        @empty
                            <p>Chưa có bình luận nào.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>



    <!-- ***** Constellation Details  End ***** -->

    <!-- ***** Constellation Collections ***** -->
    <!-- ***** Constellation Collections End ***** -->
@endsection
