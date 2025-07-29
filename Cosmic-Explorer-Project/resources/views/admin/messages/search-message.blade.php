@extends('layouts.admin.admin')

@section('title')
    <title>Messages Dashboard</title>
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
                        <th style="width: 10%">
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
                        <th colspan="2" style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($search_message->isNotEmpty())
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
                                        {{ $message->time_reply_message->format('d/m/Y - H:i:s') }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($message->status)
                                        <p class="bg-success mb-0" style="padding: 6px 12px; border-radius: 4px">
                                            {{ $message->replied_by }}</p>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.details-message', $message->id) }}" class="btn btn-info">
                                        <i class="nav-icon fas fa-reply"></i>
                                        <span>Reply</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.delete-message', $message->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Confirm deletion for item ID: {{ $message->slug }}?')">
                                        <i class="nav-icon fas fa-trash"></i>
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
                <a href="{{ route('admin.messages') }}" class="btn btn-info col-2">Back</a>
            </div>
        </div>
    </div>
@endsection
