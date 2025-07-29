@extends('layouts.admin.admin')

@section('title')
    <title>Subscribe Dashboard</title>
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
                        <input type="hidden" name="id" value="{{ $details_subscribe->id }}" class="form-control"
                            disabled>
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
                        <input type="text" name="registration_date"
                            value="{{ $details_subscribe->registration_date->format('d/m/Y - H:i:s') }}"
                            id="registration_date" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" value="Subscribe" id="status" class="form-control" disabled>
                    </div>
                </div>
                <div class="d-flex justify-content-end card-footer">
                    <a href="{{ route('admin.subscribe') }}" class="btn btn-secondary mr-2 px-5 py-2">Back</a>
                </div>
            </div>
        </section>
    </form>
@endsection
