@extends('layouts.admin.admin')

@section('title')
    <title>All Message</title>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Message</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
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
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        @if ($message->id % 2)
                            <tr class="text-center bg-secondary">
                                <td>{{ $message->id }}</td>
                                <td>
                                    {{ $message->sender_name }}
                                </td>
                                <td>
                                    {{ $message->sender_email }}
                                </td>
                                <td>
                                    {{ $message->time_received_message->format('d/m/Y - H:i') }}
                                </td>
                                <td></td>
                                <td>
                                    @if (!$message->status)
                                        <p class="bg-danger text-light mb-0" style="padding: 6px 12px; border-radius: 4px">
                                            Pending</p>
                                    @else
                                        <p class="bg-success text-light mb-0" style="padding: 6px 12px; border-radius: 4px">
                                            Replied</p>
                                    @endif
                                </td>
                                <td>
                                    @if (!$message->status)
                                        <a href="#" class="btn btn-info text-light">
                                            Reply
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-info text-light disabled">
                                            Reply
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @else
                            <tr class="text-center bg-secondary-subtle">
                                <td>{{ $message->id }}</td>
                                <td>
                                    {{ $message->sender_name }}
                                </td>
                                <td>
                                    {{ $message->sender_email }}
                                </td>
                                <td>
                                    {{ $message->time_received_message->format('d/m/Y - H:i') }}
                                </td>
                                <td></td>
                                <td>
                                    @if (!$message->status)
                                        <p class="bg-danger text-light mb-0" style="padding: 6px 12px; border-radius: 4px">
                                            Pending</p>
                                    @else
                                        <p class="bg-success text-light mb-0" style="padding: 6px 12px; border-radius: 4px">
                                            Replied</p>
                                    @endif
                                </td>
                                <td>
                                    @if (!$message->status)
                                        <a href="#" class="btn btn-info text-light">
                                            Reply
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-info text-light disabled">
                                            Reply
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
