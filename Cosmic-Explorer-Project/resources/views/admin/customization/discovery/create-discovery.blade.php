@extends('layouts.admin.admin')

@section('title')
    <title>Discovery Dashboard</title>
@endsection

@section('content')
    @if (session('error-create-discovery'))
        <div class="alert alert-danger">
            {{ session('error-create-discovery') }}
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
    <form action="{{ route('admin.save-post-discovery') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Post</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" class="form-control" value="{{ old('slug') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input id="author" name="author" value="{{ old('author', 'Admin') }}" class="form-control"
                            disabled>
                        <input type="hidden" id="author" name="author" value="{{ old('author', 'Admin') }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title_details">Title Details</label>
                        <input id="title_details" name="title_details" class="form-control"
                            value="{{ old('title_details') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description_short">Description Short</label>
                        <textarea id="description_short" name="description_short" class="form-control" rows="10" cols="10" required>{{ old('description_short') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_details">Description Details</label>
                        <textarea id="description_details" name="description_details" class="form-control" rows="10" cols="10"
                            required>{{ old('description_details') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content_1">Content 1:</label>
                        <textarea id="content_1" name="content_1" class="form-control" rows="10" cols="10" required>{{ old('content_1') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content_2">Content 2:</label>
                        <textarea id="content_2" name="content_2" class="form-control" rows="10" cols="10" required>{{ old('content_2') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo" class="form-label d-block mb-2">Photo 1 (Featured):</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo" name="photo" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP)
                                    </small>
                                </div>
                            </div>
                            <label for="name_photo" class="mt-2">Name Photo 1:</label>
                            <input type="text" id="name_photo" name="name_photo" class="form-control"
                                value="{{ old('name_photo') }}" required>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_2" class="form-label d-block mb-2">Photo 2:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo_2" name="photo_2" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP)
                                    </small>
                                </div>
                            </div>
                            <label for="name_photo_2" class="mt-2">Name Photo 2:</label>
                            <input type="text" id="name_photo_2" name="name_photo_2" class="form-control"
                                value="{{ old('name_photo_2') }}" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.customization-discovery') }}"
                        class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Create</button>
                </div>
            </div>
        </section>
    </form>
@endsection
