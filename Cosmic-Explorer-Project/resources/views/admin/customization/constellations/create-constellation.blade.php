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
    <form action="{{ route('admin.save-constellation') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Constellation</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name Constellation</label>
                        <input id="name" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Orion (The Hunter)" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" name="slug" class="form-control" value="{{ old('slug') }}"
                            placeholder="Orion" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" value="{{ old('title') }}" class="form-control"
                            placeholder="Orion" required>
                    </div>
                    <div class="form-group">
                        <label for="identification">Identification</label>
                        <textarea id="identification" name="identification" class="form-control" rows="10" cols="10"
                            placeholder="This is a very bright constellation, easy to find in the winter sky (December - March). It's located near the celestial equator, so you can see it from most places on Earth. It looks like a hunter, clearly marked by Orion's Belt (three bright stars in a straight line)"
                            required>{{ old('identification') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="main_stars">Main Stars</label>
                        <textarea id="main_stars" name="main_stars" class="form-control" rows="10" cols="10"
                            placeholder="Betelgeuse: A huge, red-orange star on the hunter's shoulder, estimated to be about 1,000 times bigger than our Sun. Rigel: A brilliant blue-white star on the hunter's foot"
                            required>{{ old('main_stars') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="notable_features">Notable Features</label>
                        <textarea id="notable_features" name="notable_features" class="form-control" rows="10" cols="10"
                            placeholder="The Orion Nebula (M42), a giant star-forming region about 1,344 light-years away. You can often see it with your naked eye as a fuzzy patch in dark skies"
                            required>{{ old('notable_features') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="myths_meaning">Myths Meaning</label>
                        <textarea id="myths_meaning" name="myths_meaning" class="form-control" rows="10" cols="10"
                            placeholder="In Greek mythology, Orion was a great hunter. This constellation is also useful for finding nearby constellations"
                            required>{{ old('myths_meaning') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo" class="form-label d-block mb-2">Photo 1 (Featured)</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo" name="photo" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_2" class="form-label d-block mb-2">Photo 2</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo_2" name="photo_2" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_3" class="form-label d-block mb-2">Photo 3</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo_3" name="photo_3" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-12 col-md-6">
                            <label for="photo_4" class="form-label d-block mb-2">Photo 4</label>
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-sm-8 col-md-12 col-lg-12">
                                    <input type="file" id="photo_4" name="photo_4" accept="image/*">
                                    <small class="form-text text-muted mt-2">
                                        Please select a new image file (JPG, JPEG, PNG, GIF, WEBP, SVG).
                                    </small>
                                </div>
                            </div>
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
