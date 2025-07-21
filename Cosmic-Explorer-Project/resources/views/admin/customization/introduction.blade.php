@extends('layouts.admin.admin')

@section('title')
    <title>Discovery Dashboard</title>
@endsection

@section('content')
    <form action="{{ route('admin.update-introduction') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Details Introduction</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @if (session('success-update-introduction'))
                                <div id="successAlert"
                                    class="alert alert-success alert-dismissible fade show mt-2 bg-success" role="alert">
                                    {{ session('success-update-introduction') }}
                                </div>
                            @endif
                        </div>
                    </div>
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
                    <div class="form-group">
                        <label for="photo" class="mr-3">Photo: </label>
                        <input type="file" id="photo" name="photo">
                        <img src="{{ asset('images') }}/images-introduction/{{ $information->photo }}" alt=""
                            height="100px" width="100px">
                    </div>
                    <div class="form-group">
                        <label for="photo_2" class="mr-2">Photo 2:</label>
                        <input type="file" id="photo_2" id="photo_2" name="photo_2">
                    </div>
                    <div class="form-group">
                        <label for="photo_3" class="mr-2">Photo 3:</label>
                        <input type="file" id="photo_3" id="photo_3" name="photo_3">
                    </div>
                    <div class="form-group">
                        <label for="photo_4" class="mr-2">Photo 4:</label>
                        <input type="file" id="photo_4" id="photo_4" name="photo_4">
                    </div>
                    <div class="form-group">
                        <label for="photo_5" class="mr-2">Photo 5:</label>
                        <input type="file" id="photo_5" id="photo_5" name="photo_5">
                    </div>
                    <div class="form-group">
                        <label for="photo_6" class="mr-2">Photo 6:</label>
                        <input type="file" id="photo_6" id="photo_6" name="photo_6">
                    </div>
                    <div class="form-group">
                        <label for="photo_7" class="mr-2">Photo 7:</label>
                        <input type="file" id="photo_7" id="photo_7" name="photo_7">
                    </div>
                    <div class="form-group">
                        <label for="photo_8" class="mr-2">Photo 8:</label>
                        <input type="file" id="photo_8" id="photo_8" name="photo_8">
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="#" class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Save</button>
                </div>
            </div>
        </section>
    </form>
@endsection
