@extends('layouts.admin.admin')

@section('title', 'Books Dashboard')

@section('content')
    @if (session('error-create-book'))
        <div class="alert alert-danger">
            {{ session('error-create-book') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.save-book') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Book</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_book">Book Name</label>
                        <input id="name_book" name="name_book" class="form-control" value="{{ old('name_book') }}"
                            placeholder="Cosmos" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" class="form-control" value="{{ old('slug') }}"
                            placeholder="Cosmos" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input id="author" name="author" class="form-control" value="{{ old('author') }}"
                            placeholder="Carl Sagan" required>
                    </div>
                    <div class="form-group">
                        <label for="publication_year">Publication Year</label>
                        <input id="publication_year" name="publication_year" class="form-control"
                            value="{{ old('publication_year') }}" placeholder="1980, (YYYY-MM-DD)" required>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input id="genre" name="genre" value="{{ old('genre') }}" class="form-control"
                            placeholder="Non-fiction, Science, Astronomy, Philosophy, History" required>
                    </div>
                    <div class="form-group">
                        <label for="link_amazon">Link Amazon</label>
                        <textarea id="link_amazon" name="link_amazon" class="form-control" rows="10" cols="10"
                            placeholder="https://a.co/d/e9vV6fk">{{ old('link_amazon') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="10" cols="10"
                            placeholder="Cosmos
                            is a classic science book that takes readers on a journey through 15 billion years of cosmic evolution, from the
                            origins of everything to humanity's place in the universe. Written in a captivating style, Sagan blends science with
                            philosophy, fostering curiosity and wonder about the vast cosmos"
                            required>{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_title">Main Title</label>
                        <textarea id="main_title" name="main_title" class="form-control" rows="10" cols="10"
                            placeholder="The Cosmos: A Grand Symphony of Science and Wonder" required>{{ old('main_title') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_content">Main Content</label>
                        <textarea id="main_content" name="main_content" class="form-control" rows="10" cols="10"
                            placeholder="This book explores the immense scale of space and time, from tiny subatomic particles to billions of galaxies, while delving into humanity's historical understanding of the cosmos, from ancient myths to groundbreaking scientific discoveries by great thinkers...."
                            required>{{ old('main_content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_content_1">Main Content 1</label>
                        <textarea id="main_content_1" name="main_content_1" class="form-control" rows="10" cols="10"
                            placeholder="A central theme woven throughout the book is the profound interconnectedness of everything, encapsulated in Sagan's famous declaration,The Cosmos is all that is or ever was or ever will be. He points out that we are literally made of star-stuff and that our existence is deeply tied to the cosmic processes that have unfolded throughout the universe is history...."
                            required>{{ old('main_content_1') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_content_2">Main Content 2</label>
                        <textarea id="main_content_2" name="main_content_2" class="form-control" rows="10" cols="10"
                            placeholder="Finally, Sagan discusses the Voyager missions and their golden records, carrying a message from humanity to potential alien civilizations, symbolizing our innate desire to explore, communicate, and connect with the universe beyond our own world"
                            required>{{ old('main_content_2') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_book" class="form-label d-block mb-2">Photo 1</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo_book" name="photo_book" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG)
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.customization-books') }}"
                        class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Create</button>
                </div>
            </div>
        </section>
    </form>
@endsection
