@extends('layouts.admin.admin')

@section('title', 'Danh sách bài viết')

@section('content')

<section class="content">

      <!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All News</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        Index
                    </th>
                    <th style="width: 20%">
                        News title
                    </th>
                    <th style="width: 30%">
                        Introduction
                    </th>
                    <th>
                        Author
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>

            
            <tbody>
                @foreach ($posts as $index => $post)
                    <tr>
                        <td>{{ $posts->firstItem() + $index }}</td>
                        <td>
                            <a>
                              {{ $post->title }}
                            </a>
                            <br/>
                        </td>
                        <td>
                          {{ $post->excerpt }}   
                        </td>
                        <td class="project_progress">
                          <small>
                             {{ $post->user->name ?? 'Không rõ' }}
                          </small>
                        </td>
                        <td class="project-state">
                          {{ $post->is_published ? 'Publish' : 'Private' }}
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('posts.show', $post->slug) }}">
                                <i class="fas fa-folder"></i>View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('admin.posts.edit', $post->id) }}">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" class="d-inline-block" method="POST" onsubmit="return confirm('Think carefully before delete')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <!-- /.card-body -->
</div>
      <!-- /.card -->
</section>
    
   {{ $posts->links('pagination::bootstrap-5') }}

    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">➕ Create a news</a>

@endsection
