@extends('layouts.admin.admin')

@section('title', 'Sửa bài viết')

@section('content')

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Introduction</label>
                    <input type="text" name="excerpt" value="{{ old('excerpt', $post->excerpt) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Main content</label>
                    <textarea name="content" rows="5" class="form-control">{{ old('content' ,$post->content) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="is_published" class="form-control">
                        <option value="1" {{ $post->is_published ? 'selected' : '' }}>Publish</option>
                        <option value="0" {{ !$post->is_published ? 'selected' : '' }}>Private</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Image</label><br>
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" width="150">
                    @endif
                    <input type="file" name="image" class="form-control-file">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            </div>
        </section>
    </form>

@endsection
