@extends('layouts.admin.admin')

@section('title', 'Thêm bài viết')

@section('content')

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create New Post</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Title</label>
                        <input name="title" type="text" id="inputName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputIntroduction">Introduction</label>
                        <textarea name="slug" id="inputIntroduction" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Main content</label>
                        <textarea name="content" id="inputDescription" class="form-control" rows="5"
                            style="max-height: 300px; overflow-y: auto;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputImage">Image</label>
                        <input type="file" name="image" id="inputImage" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Category</label>
                        <select name="category_id" id="inputStatus" class="form-control custom-select">
                            <option selected disabled>Select one</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select name="is_published" id="inputStatus" class="form-control custom-select">
                            <option selected disabled>Select one</option>
                            <option value="1">Publish</option>
                            <option value="0">Private</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create new Project" class="btn btn-success float-right">
                </div>
            </div>
        </section>

    </form>

@endsection
