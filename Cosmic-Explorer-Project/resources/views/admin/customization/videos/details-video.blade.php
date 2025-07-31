@extends('layouts.admin.admin')

@section('title', 'Videos Dashboard')

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
    @if (session('success-update-video'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success" role="alert">
            {{ session('success-update-video') }}
        </div>
    @endif
    <form action="{{ route('admin.updated-video') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Details Video: {{ $video->name_video }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="{{ $video->id }}">
                    </div>
                    <div class="form-group">
                        <label for="name_video">Name Video</label>
                        <input id="name_video" name="name_video" class="form-control" value="{{ $video->name_video }}"
                            maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            @if ($video->status)
                                <option value="0">Private</option>
                                <option value="1" selected>Publish</option>
                            @else
                                <option value="0" selected>Private</option>
                                <option value="1">Publish</option>
                            @endif
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="channel">Channel</label>
                        <input id="channel" name="channel" class="form-control" value="{{ $video->channel }}"
                            maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <textarea id="genre" name="genre" class="form-control" rows="5" cols="5" required>{{ $video->genre }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="source_video">Source Video</label>
                        <textarea id="source_video" name="source_video" class="form-control" rows="10" cols="10" required>{{ $video->source_video }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_short">Description Short</label>
                        <textarea id="description_short" name="description_short" class="form-control" rows="10" cols="10" required>{{ $video->description_short }}</textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.customization-videos') }}" class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Update</button>
                </div>
            </div>
        </section>
    </form>
@endsection
