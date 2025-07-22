@extends('layouts.admin.admin')

@section('title')
    <title>Discovery Dashboard</title>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Discovery</h3>
            <div class="card-tools">
                <form action="#" method="POST">
                    @csrf
                    <div class="input-group input-group-sm">
                        <input type="text" name="search_email" class="form-control bg-secondary"
                            placeholder="Search Message">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12">
                    @if (session('success-reply-message'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success"
                            role="alert">
                            {{ session('success-reply-message') }}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    @if (session('success-delete-message'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-danger"
                            role="alert">
                            {{ session('success-delete-message') }}
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
                        <th style="width: 30%">
                            Title
                        </th>
                        <th style="width: 5%">
                            Author
                        </th>
                        <th style="width: 15%">
                            Created Date
                        </th>
                        <th style="width: 15%">
                            Last Updated
                        </th>
                        <th colspan="2" style="width: 10%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($discovery as $item)
                        <tr class="text-center bg-secondary-subtle">
                            <td>{{ $item->id }}</td>
                            <td>
                                {{ $item->title }}
                            </td>
                            @if ($item->id)
                                <td>
                                    <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Admin</p>
                                </td>
                            @endif
                            <td>
                                {{ $item->created_at->format('d/m/Y - H:i:s') }}
                            </td>
                            <td>
                                @if ($item->updated_at)
                                    {{ $item->updated_at->format('d/m/Y - H:i:s') }}
                                @else
                                    N/A
                                @endif
                            </td>
                            </td>
                            <td>
                                <a href="{{ route('admin.customization-edit-discovery') }}" class="btn btn-info">
                                    <i class="nav-icon fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger"
                                    onclick="return confirm('Please confirm deletion for the article: {{ $item->title }}?')">
                                    <i class="nav-icon fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
