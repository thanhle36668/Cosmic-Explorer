@extends('layouts.admin.admin')

@section('content')
    <div class="container mt-4">
        <h2>Comment management</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>News Title</th>
                    <th>Commenter</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Creation date</th>
                    <th>Action</th>
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
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.comments.update', $comment->id) }}" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-info">Approved / Cancel</button>
                            </form>

                            <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}" class="d-inline" 
                                  onsubmit="return confirm('Are you sure ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $comments->links() }}
    </div>
@endsection
