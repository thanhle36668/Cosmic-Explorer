@extends('layouts.admin.admin')

@section('title')
    <title>Details Message</title>
@endsection

@section('content')
    <form action="{{ route('admin.reply-message') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Details Message</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $details_message->id }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sender_name">Name</label>
                        <input type="text" name="sender_name" value="{{ $details_message->sender_name }}"
                            id="sender_name" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="sender_email">Email</label>
                        <input type="text" name="sender_email" value="{{ $details_message->sender_email }}"
                            id="sender_email" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="time_received_message">Date</label>
                        <input type="text" name="time_received_message"
                            value="{{ $details_message->time_received_message->format('d/m/Y - H:i:s') }}"
                            id="time_received_message" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="10" cols="10" disabled>{{ $details_message->message }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="reply_message">Reply Message</label>
                        @if ($details_message->status)
                            <textarea name="reply_message" id="reply_message" class="form-control" rows="10" cols="10" disabled required>{{ $details_message->reply_message ? $details_message->reply_message : '' }}</textarea>
                        @else
                            <textarea name="reply_message" id="reply_message" class="form-control" rows="10" cols="10" required>{{ $details_message->reply_message ? $details_message->reply_message : '' }}</textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="time_reply_message">Date Reply</label>
                        @if ($details_message->status)
                            <input type="text" name="time_reply_message"
                                value="{{ $details_message->time_reply_message->format('d/m/Y - H:i:s') }}"
                                id="time_reply_message" class="form-control" required disabled>
                        @else
                            <input type="datetime-local" name="time_reply_message"
                                value="{{ $details_message->time_reply_message ? $details_message->time_reply_message->format('Y-m-d\TH:i') : '' }}"
                                id="time_reply_message" class="form-control" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="status" value="1" class="form-control">
                        <input type="hidden" name="replied_by" value="Admin" class="form-control">
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.messages') }}" class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Reply</button>
                </div>
            </div>
        </section>
    </form>
@endsection
