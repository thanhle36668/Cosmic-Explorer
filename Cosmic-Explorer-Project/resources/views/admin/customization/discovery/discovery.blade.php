@extends('layouts.admin.admin')

@section('title', 'Discovery Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <h3 class="card-title col-8 d-flex align-items-center">All Discovery</h3>
            <div class="card-tools col-4 d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.create-discovery') }}" class="btn btn-info mr-2" style="padding: 3px 6px;">Create
                    New</a>
                <form action="{{ route('admin.search-discovery') }}" method="POST">
                    @csrf
                    <div class="input-group input-group-sm">
                        <input type="text" name="search_title" class="form-control bg-secondary"
                            placeholder="Search Title">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="row">
            @if (session('success-create-discovery'))
                <div id="successAlert" class="col-12 alert alert-success alert-dismissible fade show mt-2 bg-success"
                    role="alert">
                    {{ session('success-create-discovery') }}
                </div>
            @endif
            @if (session('success-delete-discovery'))
                <div id="successAlert" class="col-12 alert alert-success alert-dismissible fade show mt-2 bg-success"
                    role="alert">
                    {{ session('success-delete-discovery') }}
                </div>
            @endif
        </div>
        <table class="table table-striped projects">
            <thead>
                <tr class="text-center bg-primary">
                    <th style="width: 5%">
                        ID
                    </th>
                    <th style="width: 50%">
                        Title
                    </th>
                    <th style="width: 5%">
                        Author
                    </th>
                    <th style="width: 5%">Status</th>
                    <th style="width: 15%">
                        Created Date
                    </th>
                    <th style="width: 15%">
                        Last Updated
                    </th>
                    <th colspan="2" style="width: 5%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($discovery as $post)
                    <tr class="text-center bg-secondary-subtle">
                        <td>{{ $post->id }}</td>
                        <td>
                            {{ $post->title }}
                        </td>
                        @if ($post->id)
                            <td>
                                <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                    Admin</p>
                            </td>
                        @endif
                        <td>
                            @if ($post->status)
                                <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                    Publish</p>
                            @else
                                <p class="bg-danger mb-0" style="padding: 6px 12px; border-radius: 4px">
                                    Private</p>
                            @endif
                        </td>
                        <td>
                            {{ $post->created_at->format('d/m/Y - H:i:s') }}
                        </td>
                        <td>
                            @if ($post->updated_at)
                                {{ $post->updated_at->format('d/m/Y - H:i:s') }}
                            @else
                                N/A
                            @endif
                        </td>
                        </td>
                        <td>
                            <a href="{{ route('admin.edit-discovery', $post->slug) }}" class="btn btn-info">
                                <i class="nav-icon fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.delete-discovery', $post->id) }}" class="btn btn-danger"
                                onclick="return confirm('Please confirm deletion for the article: {{ $post->title }}?')">
                                <i class="nav-icon fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-links mt-4 mb-4">
        {{ $discovery->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
