@extends('layouts.admin.admin')

@section('title', 'Constellations Dashboard')

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
    @if (session('success-update-constellation'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success" role="alert">
            {{ session('success-update-constellation') }}
        </div>
    @endif
    <form action="{{ route('admin.updated-constellation') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Details Constellation: {{ $constellation->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $constellation->id }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name ">Name Constellation </label>
                        <input id="name" name="name" value="{{ $constellation->name }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" value="{{ $constellation->slug }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            @if ($constellation->status)
                                <option value="0">Private</option>
                                <option value="1" selected>Publish</option>
                            @else
                                <option value="0" selected>Private</option>
                                <option value="1">Publish</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" value="{{ $constellation->title }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="identification">Identification</label>
                        <textarea id="identification" name="identification" id="identification" class="form-control" rows="10"
                            cols="10" required>{{ $constellation->identification }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_stars">Main Stars</label>
                        <textarea id="main_stars" name="main_stars" id="main_stars" class="form-control" rows="10" cols="10" required>{{ $constellation->main_stars }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="notable_features">Notable Features</label>
                        <textarea id="notable_features" name="notable_features" id="notable_features" class="form-control" rows="10"
                            cols="10" required>{{ $constellation->notable_features }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="myths_meaning">Myths Meaning</label>
                        <textarea id="myths_meaning" name="myths_meaning" id="myths_meaning" class="form-control" rows="10" cols="10"
                            required>{{ $constellation->myths_meaning }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo" class="form-label d-block mb-2">Photo 1 (Featured)</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($constellation->photo)
                                        <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($constellation->photo) }}"
                                                alt="{{ basename($constellation->photo) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <img src="{{ asset('images') }}/constellations/no-photo.jpg" alt="No Photo"
                                            height="250" width="250">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo" name="photo" accept="image/*">
                                    @if ($constellation->photo)
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
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_2" class="form-label d-block mb-2">Photo 2</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($constellation->photo_2)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($constellation->photo_2) }}"
                                                alt="{{ basename($constellation->photo_2) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <img src="{{ asset('images') }}/constellations/no-photo.jpg" alt="No Photo"
                                            height="250" width="250">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_2" name="photo_2" accept="image/*">
                                    @if ($constellation->photo_2)
                                        <small class="form-text text-muted mb-2 mt-0">
                                            Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                            <br>
                                            To keep the current photo, leave this field empty.
                                        </small>
                                        <div class="mb-2 d-flex align-items-center">
                                            <input type="checkbox" class="mr-1" id="delete_photo_2"
                                                name="delete_photo_2" value="1">
                                            <label class="mb-0" for="delete_photo_2">
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
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_3" class="form-label d-block mb-2">Photo 3</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($constellation->photo_3)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($constellation->photo_3) }}"
                                                alt="{{ basename($constellation->photo_3) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <img src="{{ asset('images') }}/constellations/no-photo.jpg" alt="No Photo"
                                            height="250" width="250">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_3" name="photo_3" accept="image/*">
                                    @if ($constellation->photo_3)
                                        <small class="form-text text-muted mb-2 mt-0">
                                            Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                            <br>
                                            To keep the current photo, leave this field empty.
                                        </small>
                                        <div class="mb-2 d-flex align-items-center">
                                            <input type="checkbox" class="mr-1" id="delete_photo_3"
                                                name="delete_photo_3" value="1">
                                            <label class="mb-0" for="delete_photo_3">
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
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_4" class="form-label d-block mb-2">Photo 4</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($constellation->photo_4)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($constellation->photo_4) }}"
                                                alt="{{ basename($constellation->photo_4) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <img src="{{ asset('images') }}/constellations/no-photo.jpg" alt="No Photo"
                                            height="250" width="250">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_4" name="photo_4" accept="image/*">
                                    @if ($constellation->photo_4)
                                        <small class="form-text text-muted mb-2 mt-0">
                                            Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                            <br>
                                            To keep the current photo, leave this field empty.
                                        </small>
                                        <div class="mb-2 d-flex align-items-center">
                                            <input type="checkbox" class="mr-1" id="delete_photo_4"
                                                name="delete_photo_4" value="1">
                                            <label class="mb-0" for="delete_photo_4">
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
                    <a href="{{ route('admin.customization-constellations') }}"
                        class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Update</button>
                </div>
            </div>
        </section>
    </form>
@endsection
