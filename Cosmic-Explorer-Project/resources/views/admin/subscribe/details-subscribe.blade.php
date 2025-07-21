@extends('layouts.admin.admin')

@section('title')
    <title>Edit Subscribe</title>
@endsection

@section('content')
    <form action="{{ route('admin.updates-subscribe') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Subscribe</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $details_subscribe->id }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $details_subscribe->name }}" id="name"
                            class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ $details_subscribe->email }}" id="email"
                            class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="registration_date">Subscribe Date</label>
                        <input type="datetime-local" name="registration_date"
                            value="{{ $details_subscribe->registration_date->format('Y-m-d\TH:i') }}" id="registration_date"
                            class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            @if ($details_subscribe->status)
                                <option value="0">Unsubscribe</option>
                                <option value="1" selected>Subscribe</option>
                            @else
                                <option value="0" selected>Unsubscribe</option>
                                <option value="1">Subscribe</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.subscribe') }}" class="btn btn-secondary mr-2 px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right px-5 py-2">Update</button>
                </div>
            </div>
        </section>
    </form>
@endsection
