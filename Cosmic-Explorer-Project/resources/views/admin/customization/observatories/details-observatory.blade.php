@extends('layouts.admin.admin')

@section('title', 'Observatories Dashboard')

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
    @if (session('success-update-observatory'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success" role="alert">
            {{ session('success-update-observatory') }}
        </div>
    @endif
    <form action="{{ route('admin.updated-observatory') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Details Observatory: {{ $observatory->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $observatory->id }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name ">Name Observatory </label>
                        <input id="name" name="name" value="{{ $observatory->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" value="{{ $observatory->slug }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            @if ($observatory->status)
                                <option value="0">Private</option>
                                <option value="1" selected>Publish</option>
                            @else
                                <option value="0" selected>Private</option>
                                <option value="1">Publish</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input id="location" name="location" value="{{ $observatory->location }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="altitude_meters">Altitude Meters</label>
                        <input id="altitude_meters" name="altitude_meters" value="{{ $observatory->altitude_meters }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="established_year">Established Year</label>
                        <input id="established_year" name="established_year" value="{{ $observatory->established_year }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="managing_organization">Managing Organization</label>
                        <input id="managing_organization" name="managing_organization"
                            value="{{ $observatory->managing_organization }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="main_instruments">Main Instruments</label>
                        <textarea id="main_instruments" name="main_instruments" id="main_instruments" class="form-control" rows="10"
                            cols="10" required>{{ $observatory->main_instruments }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="primary_research_areas">Primary Research Areas</label>
                        <textarea id="primary_research_areas" name="primary_research_areas" id="primary_research_areas" class="form-control"
                            rows="10" cols="10" required>{{ $observatory->primary_research_areas }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="public_access_info">Public Access Info</label>
                        <textarea id="public_access_info" name="public_access_info" id="public_access_info" class="form-control" rows="10"
                            cols="10" required>{{ $observatory->public_access_info }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo" class="form-label d-block mb-2">Photo 1 (Featured)</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($observatory->photo)
                                        <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($observatory->photo) }}"
                                                alt="{{ basename($observatory->photo) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <img src="{{ asset('images') }}/observatories/no-photo.jpg" alt="No Photo"
                                            height="250" width="250">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo" name="photo" accept="image/*">
                                    @if ($observatory->photo)
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
                            <label for="photo_2 " class="form-label d-block mb-2">Photo 2</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-5">
                                    @if ($observatory->photo_2)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($observatory->photo_2) }}"
                                                alt="{{ basename($observatory->photo_2) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <img src="{{ asset('images') }}/observatories/no-photo.jpg" alt="No Photo"
                                            height="250" width="250">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_2" name="photo_2" accept="image/*">
                                    @if ($observatory->photo_2)
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
                                    @if ($observatory->photo_3)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($observatory->photo_3) }}"
                                                alt="{{ basename($observatory->photo_3) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <img src="{{ asset('images') }}/observatories/no-photo.jpg" alt="No Photo"
                                            height="250" width="250">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_3" name="photo_3" accept="image/*">
                                    @if ($observatory->photo_3)
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
                                    @if ($observatory->photo_4)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($observatory->photo_4) }}"
                                                alt="{{ basename($observatory->photo_4) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 250px; width: 250px;">
                                        </div>
                                    @else
                                        <img src="{{ asset('images') }}/observatories/no-photo.jpg" alt="No Photo"
                                            height="250" width="250">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-7">
                                    <input type="file" id="photo_4" name="photo_4" accept="image/*">
                                    @if ($observatory->photo_4)
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
                    <a href="{{ route('admin.customization-observatories') }}"
                        class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Update</button>
                </div>
            </div>
        </section>
    </form>
@endsection
