@extends('layouts.admin.admin')

@section('title', 'Constellations Dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title col-8 d-flex align-items-center">All Constellation</h3>
                <div class="card-tools col-4 d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.create-constellation') }}" class="btn btn-info mr-2"
                        style="padding: 3px 6px;">Create
                        New</a>
                    <form action="{{ route('admin.search-constellation') }}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="text" name="search_name" class="form-control bg-secondary"
                                placeholder="Search Constellation">
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
                <div class="col-12">
                    @if (session('success-create-constellation'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success"
                            role="alert">
                            {{ session('success-create-constellation') }}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    @if (session('success-delete-constellation'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success"
                            role="alert">
                            {{ session('success-delete-constellation') }}
                        </div>
                    @endif
                </div>
            </div>
            <table class="table table-striped projects">
                <thead>
                    <tr class="text-center bg-primary">
                        <th style="width: 5%">
                            ID
                        </th>
                        <th style="width: 10%">
                            Photo
                        </th>
                        <th style="width: 10%">
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
                        <th colspan="3">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($constellations as $constellation)
                        <tr class="text-center bg-secondary-subtle">
                            <td>{{ $constellation->id }}</td>
                            <td>
                                @if ($constellation->photo)
                                    <img src="{{ asset($constellation->photo) }}"
                                        alt="{{ basename($constellation->photo) }}" height="150" width="150"
                                        class="me-sm-3 mb-2 mb-sm-0">
                                @else
                                    <div class="icon">
                                        <img src="{{ asset('images') }}/constellations/no-photo.jpg" alt="no-photo.jpg"
                                            height="150" width="150">
                                    </div>
                                @endif
                            </td>
                            <td>
                                {{ $constellation->name }}
                            </td>
                            <td>
                                @if ($constellation->status)
                                    <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Publish</p>
                                @else
                                    <p class="bg-danger mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Private</p>
                                @endif
                            </td>
                            <td>
                                {{ $constellation->created_at->format('d/m/Y - H:i:s') }}
                            </td>
                            <td>
                                @if ($constellation->updated_at)
                                    {{ $constellation->updated_at->format('d/m/Y - H:i:s') }}
                                @else
                                    N/A
                                @endif
                            </td>
                            @if ($constellation->status)
                                <td>
                                    <a href="{{ route('details-constellation', $constellation->slug) }}"
                                        class="btn btn-info" target="blank">
                                        <i class="nav-icon far fa-folder d-inline"></i>
                                        <span>View</span>
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('details-constellation', $constellation->slug) }}"
                                        class="btn btn-info disabled" target="blank">
                                        <i class="nav-icon far fa-folder d-inline"></i>
                                        <span>View</span>
                                    </a>
                                </td>
                            @endif
                            <td>
                                <a href="{{ route('admin.edit-constellation', $constellation->slug) }}"
                                    class="btn btn-info">
                                    <i class="nav-icon fas fa-edit d-inline"></i>
                                    <span>Edit</span>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.delete-constellation', $constellation->id) }}"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete planet with ID: {{ $constellation->id }}?')">
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
            {{ $constellations->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
