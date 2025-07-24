@extends('layouts.admin.admin')

@section('title')
    <title>Planet Dashboard</title>
@endsection

@section('content')
    @if (session('error-create-planet'))
        <div class="alert alert-danger">
            {{ session('error-create-planet') }}
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
    <form action="{{ route('admin.save-planet') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Planet</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="e.g., Mars, Kepler-186f, Proxima Centauri b" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" class="form-control" value="{{ old('slug') }}"
                            placeholder="e.g., Mars, Kepler-186f, Proxima Centauri b" required>
                    </div>
                    <div class="form-group">
                        <label for="title_short">Title Short</label>
                        <textarea id="title_short" name="title_short" class="form-control" rows="5" cols="5"
                            placeholder="e.g., K2-18b, Earth, Venus" required>{{ old('title_short') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="discovery_date">Discovery Date</label>
                        <input id="discovery_date" name="discovery_date" class="form-control"
                            value="{{ old('discovery_date') }}" placeholder="e.g., 1989-10-14 (YYYY-MM-DD), 17th Century"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="diameter_km">Diameter Km</label>
                        <input id="diameter_km" name="diameter_km" value="{{ old('diameter_km') }}"
                            placeholder="e.g., 12742 (km), 6779 (km)" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="avg_distance_to_earth_km">Avg Distance To Earth Km</label>
                        <input id="avg_distance_to_earth_km" name="avg_distance_to_earth_km" class="form-control"
                            value="{{ old('avg_distance_to_earth_km') }}"
                            placeholder="e.g., 225 million (km), 54.6 million (km) - closest approach" required>
                    </div>
                    <div class="form-group">
                        <label for="avg_distance_to_sun_km">Avg Distance To Sun Km</label>
                        <input id="avg_distance_to_sun_km" name="avg_distance_to_sun_km" class="form-control"
                            value="{{ old('avg_distance_to_sun_km') }}"
                            placeholder="e.g., 150 million (km), 228 million (km)" required>
                    </div>
                    <div class="form-group">
                        <label for="brief_intro_composition">Brief Intro Composition</label>
                        <textarea id="brief_intro_composition" name="brief_intro_composition" class="form-control" rows="10" cols="10"
                            placeholder="e.g., Rocky planet, gas giant, ice giant, may have liquid water on surface." required>{{ old('brief_intro_composition') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo" class="form-label d-block mb-2">Photo 1 (Featured):</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo" name="photo" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG)
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_2" class="form-label d-block mb-2">Photo 2:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo_2" name="photo_2" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG)
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_3" class="form-label d-block mb-2">Photo 3:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo_3" name="photo_3" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG)
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_4" class="form-label d-block mb-2">Photo 4:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo_4" name="photo_4" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG)
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_5" class="form-label d-block mb-2">Photo 5 (Carousel Image):</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo_5" name="photo_5" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG)
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.customization-planets') }}"
                        class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Create</button>
                </div>
            </div>
        </section>
    </form>
@endsection
