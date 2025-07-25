@extends('layouts.admin.admin')

@section('title')
    <title>Planets Dashboard</title>
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
    @if (session('success-update-planet'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success" role="alert">
            {{ session('success-update-planet') }}
        </div>
    @endif
    <form action="{{ route('admin.updated-planet') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Details Planet: {{ $planet->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $planet->id }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name ">Name Planet </label>
                        <input id="name" name="name" value="{{ $planet->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" value="{{ $planet->slug }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            @if ($planet->status)
                                <option value="0">Private</option>
                                <option value="1" selected>Publish</option>
                            @else
                                <option value="0" selected>Private</option>
                                <option value="1">Publish</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title_short">Title Short</label>
                        <textarea id="title_short" name="title_short" id="title_short" class="form-control" rows="10" cols="10"
                            required>{{ $planet->title_short }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="discovery_date">Discovery Date</label>
                        <input id="discovery_date" name="discovery_date" value="{{ $planet->discovery_date }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="diameter_km">Diameter Km</label>
                        <input id="diameter_km" name="diameter_km" value="{{ $planet->diameter_km }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="avg_distance_to_earth_km">Avg Distance To Earth Km</label>
                        <input id="avg_distance_to_earth_km" name="avg_distance_to_earth_km"
                            value="{{ $planet->avg_distance_to_earth_km }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="avg_distance_to_sun_km">Avg Distance To Sun Km</label>
                        <input id="avg_distance_to_sun_km" name="avg_distance_to_sun_km"
                            value="{{ $planet->avg_distance_to_sun_km }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="brief_intro_composition">Brief Intro Composition</label>
                        <textarea id="brief_intro_composition" name="brief_intro_composition" id="brief_intro_composition" class="form-control"
                            rows="10" cols="10" required>{{ $planet->brief_intro_composition }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo" class="form-label d-block mb-2">Photo 1 (Featured):</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($planet->photo)
                                        <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($planet->photo) }}" alt="{{ basename($planet->photo) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo" name="photo" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, GIF, PNG, SVG, WEBP)
                                    </small>
                                    @if ($planet->photo)
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
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($planet->photo_2)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($planet->photo_2) }}"
                                                alt="{{ basename($planet->photo_2) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_2" name="photo_2" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, GIF, PNG, SVG, WEBP)
                                    </small>
                                    @if ($planet->photo_2)
                                        <small class="form-text text-muted">
                                            To keep the current photo, leave this field empty.
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_3" class="form-label d-block mb-2">Photo 3:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($planet->photo_3)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($planet->photo_3) }}"
                                                alt="{{ basename($planet->photo_3) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_3" name="photo_3" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, GIF, PNG, SVG, WEBP)
                                    </small>
                                    @if ($planet->photo_3)
                                        <small class="form-text text-muted">
                                            To keep the current photo, leave this field empty.
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_4" class="form-label d-block mb-2">Photo 4:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($planet->photo_4)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($planet->photo_4) }}"
                                                alt="{{ basename($planet->photo_4) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_4" name="photo_4" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, GIF, PNG, SVG, WEBP)
                                    </small>
                                    @if ($planet->photo_4)
                                        <small class="form-text text-muted">
                                            To keep the current photo, leave this field empty.
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_5" class="form-label d-block mb-2">Photo 5:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($planet->photo_5)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($planet->photo_5) }}"
                                                alt="{{ basename($planet->photo_5) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_5" name="photo_5" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, GIF, PNG, SVG, WEBP)
                                    </small>
                                    @if ($planet->photo_5)
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
                    <a href="{{ route('admin.customization-planets') }}"
                        class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Save</button>
                </div>
            </div>
        </section>
    </form>
@endsection
