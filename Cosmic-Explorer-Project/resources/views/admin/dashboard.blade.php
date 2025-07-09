@extends('layouts.admin')

@section('title', 'Trang quản trị')

@section('content')
    <h1 class="mb-4">Bảng điều khiển</h1>
    <p>Xin chào, {{ auth()->user()->name }}!</p>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="btn btn-danger">Đăng xuất</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection
