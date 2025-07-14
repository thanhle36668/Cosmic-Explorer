@extends('layouts.admin.admin')

@section('title', 'Thêm bài viết')

@section('content')

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <section class="content">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New Post</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input name="tittle" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Introduction</label>
                <textarea name="introduction" id="inputDescription" class="form-control" rows="2"></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">Main content</label>
                <textarea name="content" id="inputDescription" class="form-control" rows="5" style="max-height: 300px; overflow-y: auto;"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Category</label>
                <select name="category" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Planet</option>
                  <option>Chom sao</option>
                  <option>Dai thien van</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select name="status" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Publish</option>
                  <option>Private</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Author</label>
                <input name="user_id" type="text" id="inputName" class="form-control">
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
