@extends('layouts.admin.admin')

@section('title', 'Danh sách bài viết')

@section('content')

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Posts</h3>
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
                        <tr class="text-center">
                            <th style="width: 2%">
                                ID
                            </th>
                            <th style="width: 8%">
                                Category
                            </th>
                            <th style="width: 20%">
                                Post Name
                            </th>
                            <th style="width: 30%">
                                Introduction
                            </th>
                            <th>
                                Author
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="text-center">
                                <td>
                                    {{ $post->id }}
                                </td>
                                <td>
                                    {{ $post->category_id }}
                                </td>
                                <td>
                                    {{ $post->slug }}
                                </td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    @if ($post->user_id == 1)
                                        Admin
                                    @endif
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{ route('details-new', $post->id) }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.posts.edit', $post->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{ $posts->links() }}



    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">➕ Thêm bài viết</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $post->title }}</h5>
                <p>{{ Str::limit($post->content, 100) }}</p>
                <p class="text-muted">Tác giả: {{ $post->user->name ?? 'Không rõ' }}</p>

                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-warning">✏️ Sửa</a>

                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline-block"
                    onsubmit="return confirm('Bạn chắc chắn muốn xoá?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">🗑️ Xoá</button>
                </form>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
@endsection
