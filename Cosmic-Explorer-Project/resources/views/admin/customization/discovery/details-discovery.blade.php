@extends('layouts.admin.admin')

@section('title')
    <title>Discovery Dashboard</title>
@endsection

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
    @if (session('success-update-discovery'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success" role="alert">
            {{ session('success-update-discovery') }}
        </div>
    @endif
    <form action="{{ route('admin.updated-discovery') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Details Post: {{ $post->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $post->id }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" value="{{ $post->title }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" value="{{ $post->slug }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            @if ($post->status)
                                <option value="0">Private</option>
                                <option value="1" selected>Public</option>
                            @else
                                <option value="0" selected>Private</option>
                                <option value="1">Public</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input id="author" name="author" value="{{ $post->author }}" class="form-control" required
                            disabled>
                        <input type="hidden" id="author" name="author" value="{{ $post->author }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="title_details">Title Details</label>
                        <input id="title_details" name="title_details" value="{{ $post->title_details }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description_short">Description Short</label>
                        <textarea id="description_short" name="description_short" id="description_short" class="form-control" rows="10"
                            cols="10" required>{{ $post->description_short }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_details">Description Details</label>
                        <textarea id="description_details" name="description_details" id="description_details" class="form-control"
                            rows="10" cols="10" required>{{ $post->description_details }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content_1">Content 1:</label>
                        <textarea id="content_1" name="content_1" class="form-control" rows="10" cols="10" required>{{ $post->content_1 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content_2">Content 2:</label>
                        <textarea id="content_2" name="content_2" class="form-control" rows="10" cols="10" required>{{ $post->content_2 }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo" class="form-label d-block mb-2">Photo 1 (Featured):</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-6">
                                    @if ($post->photo)
                                        <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($post->photo) }}" alt="{{ $post->photo }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-6">
                                    <input type="file" id="photo" name="photo" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP)
                                    </small>
                                    @if ($post->photo)
                                        <small class="form-text text-muted">
                                            To keep the current photo, leave this field empty.
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_2 " class="form-label d-block mb-2">Photo 2:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-6">
                                    @if ($post->photo_2)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($post->photo_2) }}" alt="{{ $post->photo_2 }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-6">
                                    <input type="file" id="photo_2" name="photo_2" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP)
                                    </small>
                                    @if ($post->photo)
                                        <small class="form-text text-muted">
                                            To keep the current photo, leave this field empty.
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.customization-discovery') }}"
                        class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Save</button>
                </div>
            </div>
        </section>
    </form>
@endsection
