@extends('layouts.admin.admin')

@section('title')
    <title>Message</title>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Message</h3>
            <div class="card-tools">
                <form action="{{ route('admin.search-message') }}" method="POST">
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
                        <th style="width: 15%">
                            Name
                        </th>
                        <th style="width: 15%">
                            Email
                        </th>
                        <th style="width: 15%">
                            Date
                        </th>
                        <th style="width: 10%">
                            Status
                        </th>
                        <th style="width: 15%">
                            Date Reply
                        </th>
                        <th style="width: 10%">
                            Replied By
                        </th>
                        <th colspan="2" style="width: 15%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr class="text-center bg-secondary-subtle">
                            <td>{{ $message->id }}</td>
                            <td>
                                {{ $message->sender_name }}
                            </td>
                            <td>
                                {{ $message->sender_email }}
                            </td>
                            <td>
                                {{ $message->time_received_message->format('d/m/Y - H:i:s') }}
                            </td>
                            <td>
                                @if ($message->status)
                                    <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Replied</p>
                                @else
                                    <p class="bg-danger mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Pending</p>
                                @endif
                            </td>
                            <td>
                                @if ($message->time_reply_message)
                                    {{ date('d/m/Y - H:i:s', strtotime($message->time_reply_message)) }}
                                @endif
                            </td>
                            <td>
                                @if ($message->status)
                                    <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        {{ $message->replied_by }}</p>
                                @endif
                            </td>
                            </td>
                            <td>
                                <a href="{{ route('admin.details-message', $message->id) }}" class="btn btn-info">
                                    <i class="fas fa-reply"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.delete-message', $message->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Confirm deletion for item ID: {{ $message->slug }}?')">
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
    <div class="pagination-links mt-2 mb-2">
        {{ $messages->links('pagination::bootstrap-5') }}
    </div>
@endsection
