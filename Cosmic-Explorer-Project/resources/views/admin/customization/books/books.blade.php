@extends('layouts.admin.admin')

@section('title', 'Books Dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title col-8 d-flex align-items-center">All Book</h3>
                <div class="card-tools col-4 d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.create-book') }}" class="btn btn-info mr-2" style="padding: 3px 6px;">Create
                        New</a>
                    <form action="{{ route('admin.search-book') }}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="text" name="search_name" class="form-control bg-secondary"
                                placeholder="Search Book">
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
            @if (session('success-create-book'))
                <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success"
                    role="alert">
                    {{ session('success-create-book') }}
                </div>
            @endif
            @if (session('success-delete-book'))
                <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success"
                    role="alert">
                    {{ session('success-delete-book') }}
                </div>
            @endif
            <table class="table table-striped projects">
                <thead>
                    <tr class="text-center bg-primary">
                        <th style="width: 2%">
                            ID
                        </th>
                        <th style="width: 10%">
                            Photo
                        </th>
                        <th style="width: 13%">
                            Name
                        </th>
                        <th style="width: 5%">
                            Status
                        </th>
                        <th style="width: 15%">
                            Created Date
                        </th>
                        <th style="width: 15%">
                            Last Updated
                        </th>
                        <th colspan="3" style="width: 25%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="text-center bg-secondary-subtle">
                            <td>{{ $book->id }}</td>
                            <td>
                                @if ($book->photo_book)
                                    <img src="{{ asset($book->photo_book) }}" alt="{{ basename($book->photo_book) }}"
                                        height="150" width="150" class="me-sm-3 mb-2 mb-sm-0">
                                @else
                                    <div class="icon">
                                        <img src="{{ asset('images') }}/books/no-photo.jpg" alt="no-photo.jpg"
                                            height="150" width="150">
                                    </div>
                                @endif
                            </td>
                            <td>
                                {{ $book->name_book }}
                            </td>
                            <td>
                                @if ($book->status)
                                    <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Publish</p>
                                @else
                                    <p class="bg-danger mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Private</p>
                                @endif
                            </td>
                            <td>
                                {{ $book->created_at->format('d/m/Y - H:i:s') }}
                            </td>
                            <td>
                                @if ($book->updated_at)
                                    {{ $book->updated_at->format('d/m/Y - H:i:s') }}
                                @else
                                    N/A
                                @endif
                            </td>
                            @if ($book->status)
                                <td>
                                    <a href="{{ route('details-book', $book->slug) }}" class="btn btn-info" target="blank">
                                        <i class="nav-icon far fa-folder d-inline"></i>
                                        <span>View</span>
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a href="#" class="btn btn-info disabled">
                                        <i class="nav-icon far fa-folder d-inline"></i>
                                        <span>View</span>
                                    </a>
                                </td>
                            @endif
                            <td>
                                <a href="{{ route('admin.edit-book', $book->slug) }}" class="btn btn-info">
                                    <i class="nav-icon fas fa-edit d-inline"></i>
                                    <span>Edit</span>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.delete-book', $book->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete book with name: {{ $book->name_book }}?')">
                                    <i class="nav-icon fas fa-trash d-inline"></i>
                                    <span>Remove</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-links mt-4 mb-4">
            {{ $books->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
