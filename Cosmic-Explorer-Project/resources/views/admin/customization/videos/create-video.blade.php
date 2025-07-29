@extends('layouts.admin.admin')

@section('title', 'Videos Dashboard')

@section('content')
    @if (session('error-create-video'))
        <div class="alert alert-danger">
            {{ session('error-create-video') }}
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
    <form action="{{ route('admin.save-video') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Video</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_video">Name Video</label>
                        <input id="name_video" name="name_video" class="form-control" value="{{ old('name_video') }}"
                            placeholder="Black Holes: Crash Course Astronomy #33" required>
                    </div>
                    <div class="form-group">
                        <label for="channel">Channel</label>
                        <input id="channel" name="channel" class="form-control" value="{{ old('channel') }}"
                            placeholder="CrashCourse" required>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <textarea id="genre" name="genre" class="form-control" rows="5" cols="5"
                            placeholder="Popular Science, Education, Astronomy" required>{{ old('genre') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="source_video">Source Video</label>
                        <textarea id="source_video" name="source_video" class="form-control" rows="10" cols="10"
                            placeholder="https://www.youtube.com/embed/qZWPBKULkdQ?si=3xNauGOySAxxvOQw - NOTE: LINK EMBED YOUTUBE" required>{{ old('source_video') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_short">Description Short</label>
                        <textarea id="description_short" name="description_short" class="form-control" rows="10" cols="10"
                            placeholder="Time and Light Eaters! Are you ready to discover how they're born from the death of colossal stars and what makes them so hauntingly bizarre?"
                            required>{{ old('description_short') }}</textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.customization-videos') }}" class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Create</button>
                </div>
            </div>
        </section>
    </form>
@endsection
