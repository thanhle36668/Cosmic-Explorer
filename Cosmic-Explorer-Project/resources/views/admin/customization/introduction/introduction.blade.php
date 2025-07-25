@extends('layouts.admin.admin')

@section('title')
    <title>Introduction Dashboard</title>
@endsection

@section('content')
    <form action="{{ route('admin.updated-introduction') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                @if (session('success-update-introduction'))
                    <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success"
                        role="alert">
                        {{ session('success-update-introduction') }}
                    </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">Details Introduction</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $information->id }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="website_name">Name Website</label>
                        <input id="website_name" name="website_name" value="{{ $information->website_name }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="short_introduction">Short Introduction</label>
                        <input id="short_introduction" name="short_introduction"
                            value="{{ $information->short_introduction }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="short_introduction_2">Short Introduction 2</label>
                        <input id="short_introduction_2" name="short_introduction_2"
                            value="{{ $information->short_introduction_2 }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="company_description">Company Description</label>
                        <textarea id="company_description" name="company_description" id="company_description" class="form-control"
                            rows="10" cols="10" required>{{ $information->company_description }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo" class="form-label d-block mb-2">Photo:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-3">
                                    @if ($information->photo)
                                        <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($information->photo) }}"
                                                alt="{{ basename($information->photo) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 140px; width: 140px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-9">
                                    <input type="file" id="photo" name="photo" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP). Max size 2MB.
                                    </small>
                                    @if ($information->photo)
                                        <small class="form-text text-muted">
                                            To keep the current photo, leave this field empty.
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_2" class="form-label d-block mb-2">Photo 2:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-3">
                                    @if ($information->photo_2)
                                        <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($information->photo_2) }}"
                                                alt="{{ basename($information->photo_2) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 140px; width: 140px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-9">
                                    <input type="file" id="photo_2" name="photo_2" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP).
                                    </small>
                                    @if ($information->photo)
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
                                <div class="col-12 col-sm-4 col-md-12 col-lg-3">
                                    @if ($information->photo_3)
                                        <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($information->photo_3) }}"
                                                alt="{{ basename($information->photo_3) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 140px; width: 140px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-9">
                                    <input type="file" id="photo_3" name="photo_3" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP).
                                    </small>
                                    @if ($information->photo)
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
                                <div class="col-12 col-sm-4 col-md-12 col-lg-3">
                                    @if ($information->photo_4)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($information->photo_4) }}"
                                                alt="{{ basename($information->photo_4) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 140px; width: 140px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-9">
                                    <input type="file" id="photo_4" name="photo_4" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP).
                                    </small>
                                    @if ($information->photo)
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
                                <div class="col-12 col-sm-4 col-md-12 col-lg-3">
                                    @if ($information->photo_5)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($information->photo_5) }}"
                                                alt="{{ basename($information->photo_5) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 140px; width: 140px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-9">
                                    <input type="file" id="photo_5" name="photo_5" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP).
                                    </small>
                                    @if ($information->photo)
                                        <small class="form-text text-muted">
                                            To keep the current photo, leave this field empty.
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_6" class="form-label d-block mb-2">Photo 6:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-3">
                                    @if ($information->photo_6)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($information->photo_6) }}"
                                                alt="{{ basename($information->photo_6) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 140px; width: 140px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-9">
                                    <input type="file" id="photo_6" name="photo_6" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP).
                                    </small>
                                    @if ($information->photo)
                                        <small class="form-text text-muted">
                                            To keep the current photo, leave this field empty.
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_7" class="form-label d-block mb-2">Photo 7:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-3">
                                    @if ($information->photo_7)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($information->photo_7) }}"
                                                alt="{{ basename($information->photo_7) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 140px; width: 140px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-9">
                                    <input type="file" id="photo_7" name="photo_7" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP).
                                    </small>
                                    @if ($information->photo)
                                        <small class="form-text text-muted">
                                            To keep the current photo, leave this field empty.
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_8" class="form-label d-block mb-2">Photo 8:</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-4 col-md-12 col-lg-3">
                                    @if ($information->photo_8)
                                        <div
                                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                            <img src="{{ asset($information->photo_8) }}"
                                                alt="{{ basename($information->photo_8) }}"
                                                class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                style="height: 140px; width: 140px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No photo uploaded yet.</p>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-8 col-md-12 col-lg-9">
                                    <input type="file" id="photo_8" name="photo_8" accept="image/*" required>
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, PNG, GIF, WebP).
                                    </small>
                                    @if ($information->photo)
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
                    <a href="{{ route('admin.admin.dashboard') }}" class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Update</button>
                </div>
            </div>
        </section>
    </form>
@endsection
