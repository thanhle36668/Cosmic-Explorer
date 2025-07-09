@extends('layouts.admin')

@section('title', 'Danh sách bài viết')

@section('content')
    <h2 class="mb-4">Danh sách bài viết</h2>

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
