@extends('layouts.admin.admin')

@section('title')
    <title>Planets Dashboard</title>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title col-8 d-flex align-items-center">Search Planet</h3>
                <div class="card-tools col-4 d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.create-planet') }}" class="btn btn-info mr-2" style="padding: 3px 6px;">Create
                        Planet</a>
                    <form action="{{ route('admin.search-planet') }}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="text" name="search_name" class="form-control bg-secondary"
                                placeholder="Search Name Planet">
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
            <table class="table table-striped projects">
                <thead>
                    <tr class="text-center bg-primary">
                        <th style="width: 5%">
                            ID
                        </th>
                        <th style="width: 20%">
                            Photo
                        </th>
                        <th style="width: 20%">
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
                        <th colspan="2" style="width: 5%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($search_planet as $planet)
                        <tr class="text-center bg-secondary-subtle">
                            <td>{{ $planet->id }}</td>
                            <td>
                                @if ($planet->photo)
                                    <img src="{{ asset($planet->photo) }}" alt="{{ $planet->name }}" height="150"
                                        width="150" class="me-sm-3 mb-2 mb-sm-0">
                                @else
                                    <img src="{{ asset('images') }}/planets/no-photo.jpg" alt="" height="150"
                                        width="150">
                                @endif
                            </td>
                            <td>
                                {{ $planet->name }}
                            </td>
                            <td>
                                @if ($planet->status)
                                    <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Publish</p>
                                @else
                                    <p class="bg-danger mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Private</p>
                                @endif
                            </td>
                            <td>
                                {{ $planet->created_at->format('d/m/Y - H:i:s') }}
                            </td>
                            <td>
                                @if ($planet->updated_at)
                                    {{ $planet->updated_at->format('d/m/Y - H:i:s') }}
                                @else
                                    N/A
                                @endif
                            </td>
                            </td>
                            <td>
                                <a href="{{ route('admin.edit-planet', $planet->slug) }}" class="btn btn-info">
                                    <i class="nav-icon fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.delete-planet', $planet->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete planet with ID: {{ $planet->id }}?')">
                                    <i class="nav-icon fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row d-flex flex-row-reverse">
                <a href="{{ route('admin.customization-discovery') }}" class="btn btn-info col-2">Back</a>
            </div>
        </div>
    </div>
@endsection
