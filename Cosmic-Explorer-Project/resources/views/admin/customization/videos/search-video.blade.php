@extends('layouts.admin.admin')

@section('title', 'Videos Dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title col-8 d-flex align-items-center">Search Video</h3>
                <div class="card-tools col-4 d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.create-video') }}" class="btn btn-info mr-2" style="padding: 3px 6px;">Create
                        New</a>
                    <form action="{{ route('admin.search-video') }}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="text" name="search_name" class="form-control bg-secondary"
                                placeholder="Search Video">
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
                        <th style="width: 30%">
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
                    @if ($search_video->isNotEmpty())
                        @foreach ($search_video as $video)
                            <tr class="text-center bg-secondary-subtle">
                                <td>{{ $video->id }}</td>
                                <td>
                                    {{ $video->name_video }}
                                </td>
                                <td>
                                    @if ($video->status)
                                        <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                            Publish</p>
                                    @else
                                        <p class="bg-danger mb-0" style="padding: 6px 12px; border-radius: 4px">
                                            Private</p>
                                    @endif
                                </td>
                                <td>
                                    {{ $video->created_at->format('d/m/Y - H:i:s') }}
                                </td>
                                <td>
                                    @if ($video->updated_at)
                                        {{ $video->updated_at->format('d/m/Y - H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit-video', $video->name_video) }}" class="btn btn-info">
                                        <i class="nav-icon fas fa-edit d-inline"></i>
                                        <span>Edit</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.delete-video', $video->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete video with name: {{ $video->name_video }}?')">
                                        <i class="nav-icon fas fa-trash d-inline"></i>
                                        <span>Remove</span>
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
                <a href="{{ route('admin.customization-videos') }}" class="btn btn-info col-2">Back</a>
            </div>
        </div>
    </div>
@endsection
