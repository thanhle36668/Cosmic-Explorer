@extends('layouts.admin.admin')

@section('title', 'Thêm bài viết')

@section('content')

<form action="{{ url('admin/posts/store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <section class="content">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New Post</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Planet Name</label>
                <input type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Introduction</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">Main content</label>
                <textarea id="inputDescription" class="form-control" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Category</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Planet</option>
                  <option>Chom sao</option>
                  <option>Dai thien van</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Publish</option>
                  <option>Private</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Copywriter</label>
                <input type="text" id="inputProjectLeader" class="form-control">
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
