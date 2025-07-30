@extends('layouts.admin.admin')

@section('title', 'Books Dashboard')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success-update-book'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success" role="alert">
            {{ session('success-update-book') }}
        </div>
    @endif
    <form action="{{ route('admin.updated-book') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Details Book: {{ $book->name_book }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $book->id }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name_book">Name</label>
                        <input id="name_book" name="name_book" class="form-control" value="{{ $book->name_book }}" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" class="form-control" value="{{ $book->slug }}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            @if ($book->status)
                                <option value="0">Private</option>
                                <option value="1" selected>Publish</option>
                            @else
                                <option value="0" selected>Private</option>
                                <option value="1">Publish</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input id="author" name="author" class="form-control" value="{{ $book->author }}" required>
                    </div>
                    <div class="form-group">
                        <label for="publication_year">Publication Year</label>
                        <input id="publication_year" name="publication_year" class="form-control"
                            value="{{ $book->publication_year }}" required>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input id="genre" name="genre" value="{{ $book->genre }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="link_amazon">Link Amazon</label>
                        <textarea id="link_amazon" name="link_amazon" class="form-control" rows="10" cols="10">{{ $book->link_amazon }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="10" cols="10" required>{{ $book->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_title">Main Title</label>
                        <textarea id="main_title" name="main_title" class="form-control" rows="10" cols="10" required>{{ $book->main_title }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_content">Main Content</label>
                        <textarea id="main_content" name="main_content" class="form-control" rows="10" cols="10" required>{{ $book->main_content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_content_1">Main Content 1</label>
                        <textarea id="main_content_1" name="main_content_1" class="form-control" rows="10" cols="10" required>{{ $book->main_content_1 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_content_2">Main Content 2</label>
                        <textarea id="main_content_2" name="main_content_2" class="form-control" rows="10" cols="10" required>{{ $book->main_content_2 }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_book" class="form-label d-block mb-2">Photo</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($book->photo_book)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($book->photo_book) }}"
                                                alt="{{ basename($book->photo_book) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <img src="{{ asset('images') }}/books/no-photo.jpg" alt="No Photo"
                                            height="250" width="250">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_book" name="photo_book" accept="image/*">
                                    @if ($book->photo_book)
                                        <small class="form-text text-muted mb-2 mt-0">
                                            Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                            <br>
                                            To keep the current photo, leave this field empty.
                                        </small>
                                        <div class="mb-2 d-flex align-items-center">
                                            <input type="checkbox" class="mr-1" id="delete_photo" name="delete_photo"
                                                value="1">
                                            <label class="mb-0" for="delete_photo">
                                                Delete current photo!!!
                                            </label>
                                        </div>
                                    @else
                                        <small class="form-text text-muted mb-2">
                                            Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                            <br>
                                            To keep the current photo, leave this field empty.
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.customization-books') }}"
                        class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Update</button>
                </div>
            </div>
        </section>
    </form>
@endsection
