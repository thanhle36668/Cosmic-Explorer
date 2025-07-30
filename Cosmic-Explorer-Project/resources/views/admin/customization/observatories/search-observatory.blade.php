@extends('layouts.admin.admin')

@section('title', 'Observatories Dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title col-8 d-flex align-items-center">Search Observatory</h3>
                <div class="card-tools col-4 d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.create-observatory') }}" class="btn btn-info mr-2"
                        style="padding: 3px 6px;">Create
                        New</a>
                    <form action="{{ route('admin.search-observatory') }}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="text" name="search_name" class="form-control bg-secondary"
                                placeholder="Search Observatories">
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
                        <th style="width: 10%">
                            Photo
                        </th>
                        <th style="width: 15%">
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
                    @if ($search_observatory->isNotEmpty())
                        @foreach ($search_observatory as $observatory)
                            <tr class="text-center bg-secondary-subtle">
                                <td>{{ $observatory->id }}</td>
                                <td>
                                    @if ($observatory->photo)
                                        <img src="{{ asset($observatory->photo) }}" alt="{{ $observatory->name }}"
                                            height="150" width="150" class="me-sm-3 mb-2 mb-sm-0">
                                    @else
                                        <div class="icon">
                                            <img src="{{ asset('images') }}/observatories/no-photo.jpg" alt="no-photo.jpg"
                                                height="150" width="150">
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    {{ $observatory->name }}
                                </td>
                                <td>
                                    @if ($observatory->status)
                                        <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                            Publish</p>
                                    @else
                                        <p class="bg-danger mb-0" style="padding: 6px 12px; border-radius: 4px">
                                            Private</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $observatory->created_at->format('d/m/Y - H:i:s') }}
                                </td>
                                <td>
                                    @if ($observatory->updated_at)
                                        {{ $observatory->updated_at->format('d/m/Y - H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('details-observatory', $observatory->slug) }}" class="btn btn-info"
                                        target="blank">
                                        <i class="nav-icon far fa-folder d-inline"></i>
                                        <span>View</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit-observatory', $observatory->slug) }}"
                                        class="btn btn-info">
                                        <i class="nav-icon fas fa-edit d-inline"></i>
                                        <span>Edit</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.delete-observatory', $observatory->id) }}"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete planet with ID: {{ $observatory->id }}?')">
                                        <i class="nav-icon fas fa-edit d-inline"></i>
                                        <span>Edit</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center bg-secondary-subtle">
                            <td colspan="9">No result found!!!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row d-flex flex-row-reverse">
                <a href="{{ route('admin.customization-observatories') }}" class="btn btn-info col-2">Back</a>
            </div>
        </div>
    </div>
@endsection
