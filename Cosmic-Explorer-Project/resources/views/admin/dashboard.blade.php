@extends('layouts.admin.admin')

@section('title', 'Trang quản trị')

@section('content')
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Dashboard Cosmic Explorer</h3>
            </div>
            <div class="card-body">
                <h1 class="mb-4">Dashboard Cosmic Explorer</h1>
                <p class="mb-4">Hello, {{ auth()->user()->name }}!</p>
                <a href="{{ route('logout') }}" class="btn btn-info">Logout</a>
            </div>
        </div>
    </section>
@endsection
