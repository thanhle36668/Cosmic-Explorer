@extends('layouts.admin.admin') <!-- hoặc layout admin của bạn -->

@section('content')
    <div class="container mt-4">
        <h2>Quản lý bình luận</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bài viết</th>
                    <th>Người bình luận</th>
                    <th>Nội dung</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->post->title ?? 'N/A' }}</td>
                        <td>{{ $comment->user->name ?? $comment->name }}</td>
                        <td>{{ Str::limit($comment->content, 50) }}</td>
                        <td>
                            @if($comment->approved)
                                <span class="badge bg-success">Đã duyệt</span>
                            @else
                                <span class="badge bg-warning">Chưa duyệt</span>
                            @endif
                        </td>
                        <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.comments.update', $comment->id) }}" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-info">Duyệt / Bỏ duyệt</button>
                            </form>

                            <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}" class="d-inline" 
                                  onsubmit="return confirm('Bạn có chắc muốn xoá?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Xoá</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $comments->links() }}
    </div>
@endsection
