@extends('layouts.admin.admin')

@section('title')
    <title>Messages</title>
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
            <table class="table table-striped projects">
                <thead>
                    <tr class="text-center bg-primary">
                        <th style="width: 5%">
                            ID
                        </th>
                        <th style="width: 15%">
                            Name
                        </th>
                        <th style="width: 20%">
                            Email
                        </th>
                        <th style="width: 15%">
                            Date
                        </th>
                        <th style="width: 15%">
                            Date Reply
                        </th>
                        <th style="width: 10%">
                            Status
                        </th>
                        <th colspan="2">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($search_message as $message)
                        <tr class="text-center bg-secondary-subtle">
                            <td>{{ $message->id }}</td>
                            <td>
                                {{ $message->sender_name }}
                            </td>
                            <td>
                                {{ $message->sender_email }}
                            </td>
                            <td>
                                {{ $message->time_received_message->format('Y-m-d H:i') }}
                            </td>
                            <td>
                                {{ $message->time_reply_message }}
                            </td>
                            <td>
                                @if (!$message->status)
                                    <p class="bg-danger mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Pending</p>
                                @else
                                    <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                        Replied</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.details-message', $message->id) }}" class="btn btn-info">
                                    Reply
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.delete-message', $message->id) }}" class="btn btn-danger">
                                    Delete
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
