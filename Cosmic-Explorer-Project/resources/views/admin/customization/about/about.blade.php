@extends('layouts.admin.admin')

@section('title', 'About Dashboard')

@section('content')
    <form action="{{ route('admin.updated-about') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <section class="content">
            <div class="card collapsed-card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Page</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                @if ($errors->aboutErrors->any())
                    <div class="alert alert-danger mb-0 p-2">
                        <ul>
                            @foreach ($errors->aboutErrors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success-updated-about'))
                    <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 mb-0 bg-success"
                        role="alert">
                        {{ session('success-updated-about') }}
                    </div>
                @endif
                <div class="card-body pt-1 row">
                    <div class="form-group col-12">
                        <input type="hidden" name="id" value="{{ $about->id }}" class="form-control">
                    </div>
                    <div class="form-group col-12">
                        <label for="title">Title</label>
                        <input id="title" name="title" value="{{ $about->title }}" class="form-control"
                            maxlength="250" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="description_1">Description 1</label>
                        <textarea id="description_1" name="description_1" class="form-control" rows="5" cols="5" required>{{ $about->description_1 }}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="description_2">Description 2</label>
                        <textarea id="description_2" name="description_2" class="form-control" rows="5" cols="5" required>{{ $about->description_2 }}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="link">Link</label>
                        <input id="link" name="link" value="{{ $about->link }}" class="form-control"
                            maxlength="255">
                    </div>
                    <div class="form-group col-12">
                        <label for="twitter">Link 2</label>
                        <input id="link_2" name="link_2" value="{{ $about->link_2 }}" class="form-control"
                            maxlength="255">
                    </div>
                    <div class="form-group col-12">
                        <label for="youtube">Link 3</label>
                        <input id="youtube" name="link_3" value="{{ $about->link_3 }}" class="form-control"
                            maxlength="255">
                    </div>
                    <div class="form-group col-12">
                        <label for="youtube">Link 4</label>
                        <input id="youtube" name="link_4" value="{{ $about->link_4 }}" class="form-control"
                            maxlength="255">
                    </div>
                    <div class="form-group mb-4 col-12 col-md-12">
                        <label for="photo" class="form-label d-block mb-2">Photo:</label>
                        <div class="row align-items-center g-3">
                            <div class="col-12 col-sm-4 col-md-12 col-lg-3">
                                @if ($about->photo)
                                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                        <img src="{{ asset($about->photo) }}" alt="{{ basename($about->photo) }}"
                                            class="img-thumbnail me-sm-3 mb-2 mb-sm-0" height="300" width="300">
                                    </div>
                                @else
                                    <img src="{{ asset('images') }}/about/no-photo.jpg" alt="No Photo" height="300"
                                        width="300">
                                @endif
                            </div>
                            <div class="col-12 col-sm-8 col-md-12 col-lg-3">
                                <input type="file" id="photo" name="photo"
                                    accept="image/jpeg, image/png, image/gif, image/webp, image/svg+xml" class="mb-2">
                                @if ($about->photo)
                                    <small class="form-text text-muted mb-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG). <br>
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
                                    <small class="form-text text-muted mb-2 mt-0">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG). <br>
                                        To keep the current photo, leave this field empty.
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex justify-content-end card-footer">
                        <a href="{{ route('admin.admin.dashboard') }}"
                            class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right px-5 py-2">Update</button>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <section class="content p-0">
        <div class="card collapsed-card card-primary">
            <div class="card-header">
                <h3 class="card-title">About Services</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @if ($errors->aboutServices->any())
                <div class="alert alert-danger mb-0 p-2">
                    <ul>
                        @foreach ($errors->aboutServices->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success-updated-about-services'))
                <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 mb-0 bg-success"
                    role="alert">
                    {{ session('success-updated-about-services') }}
                </div>
            @endif
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('admin.updated-about-services') }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $about_services->id }}" class="form-control">
                        <div class="row">
                            <div class="col-12 col-md-4 p-2">
                                <div class="form-group">
                                    <label for="name_service">Name</label>
                                    <input type="text" name="name" id="name_service"
                                        value="{{ $about_services->name }}" class="form-control" maxlength="250"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="description_service">Description</label>
                                    <textarea id="description_service" name="description" class="form-control" rows="5" cols="5" required>{{ $about_services->description }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-4 col-12 col-md-12">
                                        <label for="photo_service" class="form-label d-block mb-2">Photo</label>
                                        <div class="row align-items-center g-3">
                                            <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                                                @if ($about_services->photo)
                                                    <div
                                                        class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                                        <img src="{{ asset($about_services->photo) }}"
                                                            alt="{{ basename($about_services->photo) }}"
                                                            class="img-thumbnail me-sm-3 mb-2 mb-sm-0" height="300"
                                                            width="300">
                                                    </div>
                                                @else
                                                    <div
                                                        class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                                        <img src="{{ asset('images') }}/about/no-photo.jpg"
                                                            alt="No Photo" class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                            height="300" width="300">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                                                <input class="mb-2" type="file" id="photo_service" name="photo"
                                                    accept="image/jpeg, image/png, image/gif, image/webp, image/svg+xml">
                                                @if ($about_services->photo)
                                                    <small class="form-text text-muted mb-2 mt-0">
                                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                                        <br>
                                                        To keep the current photo, leave this field empty.
                                                    </small>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <input type="checkbox" class="mr-1" id="delete_photo_service"
                                                            name="delete_photo" value="1">
                                                        <label class="mb-0" for="delete_photo_service">
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
                            <div class="col-12 col-md-4 p-2">
                                <div class="form-group">
                                    <label for="name_service_2">Name</label>
                                    <input type="text" name="name_2" id="name_service_2"
                                        value="{{ $about_services->name_2 }}" class="form-control" maxlength="250"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="description_service_2">Description</label>
                                    <textarea id="description_service_2" name="description_2" class="form-control" rows="5" cols="5"
                                        required>{{ $about_services->description_2 }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-4 col-12 col-md-12">
                                        <label for="photo_service_2" class="form-label d-block mb-2">Photo</label>
                                        <div class="row align-items-center g-3">
                                            <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                                                @if ($about_services->photo_2)
                                                    <div
                                                        class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                                        <img src="{{ asset($about_services->photo_2) }}"
                                                            alt="{{ basename($about_services->photo_2) }}"
                                                            class="img-thumbnail me-sm-3 mb-2 mb-sm-0" height="300"
                                                            width="300">
                                                    </div>
                                                @else
                                                    <div
                                                        class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                                        <img src="{{ asset('images') }}/about/no-photo.jpg"
                                                            alt="No Photo" class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                            height="300" width="300">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                                                <input class="mb-2" type="file" id="photo_service_2" name="photo_2"
                                                    accept="image/jpeg, image/png, image/gif, image/webp, image/svg+xml">
                                                @if ($about_services->photo_2)
                                                    <small class="form-text text-muted mb-2 mt-0">
                                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                                        <br>
                                                        To keep the current photo, leave this field empty.
                                                    </small>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <input type="checkbox" class="mr-1" id="delete_photo_service_2"
                                                            name="delete_photo_2" value="1">
                                                        <label class="mb-0" for="delete_photo_service_2">
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
                            <div class="col-12 col-md-4 p-2">
                                <div class="form-group">
                                    <label for="name_service_3">Name</label>
                                    <input type="text" name="name_3" id="name_service_3"
                                        value="{{ $about_services->name_3 }}" class="form-control" maxlength="250"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="description_service_3">Description</label>
                                    <textarea id="description_service_3" name="description_3" class="form-control" rows="5" cols="5"
                                        required>{{ $about_services->description_3 }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-4 col-12 col-md-12">
                                        <label for="photo_service_3" class="form-label d-block mb-2">Photo</label>
                                        <div class="row align-items-center g-3">
                                            <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                                                @if ($about_services->photo_3)
                                                    <div
                                                        class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                                        <img src="{{ asset($about_services->photo_3) }}"
                                                            alt="{{ basename($about_services->photo_3) }}"
                                                            class="img-thumbnail me-sm-3 mb-2 mb-sm-0" height="300"
                                                            width="300">
                                                    </div>
                                                @else
                                                    <div
                                                        class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                                        <img src="{{ asset('images') }}/about/no-photo.jpg"
                                                            alt="No Photo" class="img-thumbnail me-sm-3 mb-2 mb-sm-0"
                                                            height="300" width="300">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                                                <input class="mb-2" type="file" id="photo_service_3" name="photo_3"
                                                    accept="image/jpeg, image/png, image/gif, image/webp, image/svg+xml">
                                                @if ($about_services->photo_3)
                                                    <small class="form-text text-muted mb-2 mt-0">
                                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                                        <br>
                                                        To keep the current photo, leave this field empty.
                                                    </small>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <input type="checkbox" class="mr-1" id="delete_photo_service_3"
                                                            name="delete_photo_3" value="1">
                                                        <label class="mb-0" for="delete_photo_service_3">
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
                            <div class="w-100 d-flex justify-content-end card-footer">
                                <a href="{{ route('admin.admin.dashboard') }}"
                                    class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right px-5 py-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
