@extends('layouts.admin.admin')

@section('title', 'About Dashboard')

@section('content')
    <form action="{{ route('admin.updated-about') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger mb-0 p-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success-updated-about'))
                    <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success"
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
                        <input id="title" name="title" value="{{ $about->title }}" class="form-control" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="description_1">Description 1</label>
                        <textarea id="description_1" name="description_1" class="form-control" rows="5" cols="5" required>{{ $about->description_1 }}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="description_2">Description 2</label>
                        <textarea id="description_2" name="description_2" class="form-control" rows="5" cols="5" required>{{ $about->description_2 }}</textarea>
                    </div>
                    <div class="form-group mb-4 col-12 col-md-12">
                        <label for="photo" class="form-label d-block mb-2">Photo:</label>
                        <div class="row align-items-center g-3">
                            <div class="col-12 col-sm-4 col-md-12 col-lg-4">
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
                            <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                                <input type="file" id="photo" name="photo" accept="image/*" class="mb-2">
                                @if ($about->photo)
                                    <div class="mb-2 d-flex align-items-center">
                                        <input type="checkbox" class="mr-1" id="delete_photo" name="delete_photo"
                                            value="1">
                                        <label class="mb-0" for="delete_photo">
                                            Delete current photo!!!
                                        </label>
                                    </div>
                                    <small class="form-text text-muted mb-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WebP, SVG). <br>
                                        To keep the current photo, leave this field empty.
                                    </small>
                                @else
                                    <small class="form-text text-muted mb-2 mt-0">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WebP, SVG). <br>
                                        To keep the current photo, leave this field empty.
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-0 col-12">
                        <button type="submit" class="btn btn-primary float-right px-5 py-2 w-100">Update</button>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <section class="content p-0">
        <div class="card card-primary">
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
            <div class="card-body">
                <div class="row">
                    @foreach ($about_services as $service)
                        <div class="col-12 col-md-4 p-2">
                            <form action="{{ route('admin.updated-about-services') }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group text-center">
                                    <h3>Column {{ $service->id }}</h3>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger mb-0 p-2">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success-updated-about-services'))
                                    <div id="successAlert"
                                        class="alert alert-success alert-dismissible fade show mt-2 bg-success"
                                        role="alert">
                                        {{ session('success-updated-about-services') }}
                                    </div>
                                @endif
                                <input type="hidden" name="id" value="{{ $service->id }}" class="form-control">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $service->name }}"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control" rows="5" cols="5" required>{{ $service->description }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-4 col-12 col-md-12">
                                        <label for="photo" class="form-label d-block mb-2">Photo:</label>
                                        <div class="row align-items-center g-3">
                                            <div class="col-12 col-sm-4 col-md-12 col-lg-6">
                                                @if ($service->photo)
                                                    <div
                                                        class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                                        <img src="{{ asset('images') }}/about/{{ $service->photo }}"
                                                            alt="{{ $service->photo }}"
                                                            class="img-thumbnail me-sm-3 mb-2 mb-sm-0" height="300"
                                                            width="300">
                                                    </div>
                                                @else
                                                    <img src="{{ asset('images') }}/about/no-photo.jpg" alt="No Photo"
                                                        height="300" width="300">
                                                @endif
                                            </div>
                                            <div class="col-12 col-sm-8 col-md-12 col-lg-6">
                                                <input class="mb-2" type="file" id="photo" name="photo"
                                                    accept="image/*">
                                                @if ($service->photo)
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <input type="checkbox" class="mr-1" id="delete_photo"
                                                            name="delete_photo" value="1">
                                                        <label class="mb-0" for="delete_photo">
                                                            Delete current photo!!!
                                                        </label>
                                                    </div>
                                                    <small class="form-text text-muted mb-2 mt-0">
                                                        Please select a new image file (JPG, JPEG, PNG, GIF, WebP, SVG).
                                                        <br>
                                                        To keep the current photo, leave this field empty.
                                                    </small>
                                                @else
                                                    <small class="form-text text-muted mb-2">
                                                        Please select a new image file (JPG, JPEG, PNG, GIF, WebP, SVG).
                                                        <br>
                                                        To keep the current photo, leave this field empty.
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <button type="submit"
                                        class="btn btn-primary float-right px-5 py-2 w-100">Update</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
