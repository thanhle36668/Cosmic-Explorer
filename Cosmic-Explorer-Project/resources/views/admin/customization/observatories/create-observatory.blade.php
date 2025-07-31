@extends('layouts.admin.admin')

@section('title', 'Observatories Dashboard')

@section('content')
    @if (session('error-create-observatory'))
        <div class="alert alert-danger">
            {{ session('error-create-observatory') }}
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
    <form action="{{ route('admin.save-observatory') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Observatory</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name Observator</label>
                        <input id="name" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="e.g., Mauna Kea Observatories, Palomar Observatory" maxlength="250" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" class="form-control" value="{{ old('slug') }}"
                            placeholder="e.g., Mauna Kea Observatories, Palomar Observatory" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input id="location" name="location" class="form-control" value="{{ old('location') }}"
                            placeholder="e.g., gMauna Kea summit, Hawaii, USA" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label for="altitude_meters">Altitude Meters</label>
                        <input id="altitude_meters" name="altitude_meters" class="form-control"
                            value="{{ old('altitude_meters') }}"
                            placeholder="e.g., 4,205 meters. Extremely high, offers excellent infrared observation and very sharp images due to stable atmosphere" maxlength="255"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="established_year">Established Year</label>
                        <input id="established_year" name="established_year" class="form-control"
                            value="{{ old('established_year') }}"
                            placeholder="e.g., First telescope began operating in 1970"  maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label for="managing_organization">Managing Organization</label>
                        <input id="managing_organization" name="managing_organization" class="form-control"
                            value="{{ old('managing_organization') }}"
                            placeholder="e.g., Run by ESO, Belongs to the Carnegie Institution for Science" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label for="main_instruments">Main instruments</label>
                        <textarea id="main_instruments" name="main_instruments" class="form-control" rows="10" cols="10"
                            placeholder="e.g., Collection of giant telescopes (optical, infrared)" required>{{ old('main_instruments') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="primary_research_areas">Primary Research Areas</label>
                        <textarea id="primary_research_areas" name="primary_research_areas" class="form-control" rows="10" cols="10"
                            required
                            placeholder="e.g., Broad, from exoplanets to cosmology. Discoveries here help us understand the universe's origin, how galaxies develop, and the search for life beyond Earth">{{ old('primary_research_areas') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="public_access_info">Public Access Info</label>
                        <textarea id="public_access_info" name="public_access_info" class="form-control" rows="10" cols="10"
                            placeholder="e.g., Has a Visitor Information Station (VIS) at a lower elevation" required>{{ old('public_access_info') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo" class="form-label d-block mb-2">Photo 1 (Featured):</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo" name="photo" accept="image/jpeg, image/png, image/gif, image/webp, image/svg+xml">
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
                                    <input type="file" id="photo_2" name="photo_2" accept="image/jpeg, image/png, image/gif, image/webp, image/svg+xml">
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
                                    <input type="file" id="photo_3" name="photo_3" accept="image/jpeg, image/png, image/gif, image/webp, image/svg+xml">
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
                                    <input type="file" id="photo_4" name="photo_4" accept="image/jpeg, image/png, image/gif, image/webp, image/svg+xml">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG)
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.customization-observatories') }}"
                        class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Create</button>
                </div>
            </div>
        </section>
    </form>
@endsection
