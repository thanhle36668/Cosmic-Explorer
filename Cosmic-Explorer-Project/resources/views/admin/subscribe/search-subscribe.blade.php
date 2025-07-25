@extends('layouts.admin.admin')

@section('title')
    <title>Subscribe Dashboard</title>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Subscribe</h3>
            <div class="card-tools">
                <form action="{{ route('admin.search-subscribe') }}" method="POST">
                    @csrf
                    <div class="input-group input-group-sm">
                        <input type="text" name="email" class="form-control bg-secondary" placeholder="Search Subscribe">
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
                    @if (session('success-update-subscribe'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-success"
                            role="alert">
                            {{ session('success-update-subscribe') }}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    @if (session('success-delete-subscribe'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-2 bg-danger"
                            role="alert">
                            {{ session('success-delete-subscribe') }}
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
                        <th style="width: 15%">
                            Name
                        </th>
                        <th style="width: 15%">
                            Email
                        </th>
                        <th style="width: 15%">
                            Subscribe Date
                        </th>
                        <th style="width: 10%">
                            Status
                        </th>
                        <th colspan="2" style="width: 15%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($search_subscribe as $person)
                        <tr class="text-center bg-secondary-subtle">
                            <td>{{ $person->id }}</td>
                            <td>
                                {{ $person->name }}
                            </td>
                            <td>
                                {{ $person->email }}
                            </td>
                            <td>
                                {{ $person->registration_date }}
                            </td>
                            <td>
                                @if ($person->status)
                                    <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Subscribe</p>
                                @else
                                    <p class="bg-danger mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Unsubscribe</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.edit-subscribe', $person->slug) }}" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.delete-subscribe', $person->slug) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete the user with email: {{ $person->slug }}?')">
                                    <i class="fas fa-trash"></i>
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
