@extends('layouts.admin.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Dashboard Cosmic Explorer</h3>
            </div>
            <div class="card-body">
                <h1 class="mb-4">Dashboard Cosmic Explorer</h1>
                <p class="mb-2">Hello, {{ auth()->user()->name }}!</p>
                <div class="mb-2">
                    <span>Total Planet:</span>
                    <span>{{ $total_planet }}</span>
                </div>
                <div class="mb-2">
                    <span>Total Constellation:</span>
                    <span>{{ $total_constellation }}</span>
                </div>
                <div class="mb-2">
                    <span>Total Observatory:</span>
                    <span>{{ $total_observatory }}</span>
                </div>
                <div class="mb-2">
                    <span>Total Post (Discovery):</span>
                    <span>{{ $total_post_discovery }}</span>
                </div>
                <div class="mb-2">
                    <span>Total Post (News):</span>
                    <span>{{ $total_post }}</span>
                    <span> - Total Comment (News):</span>
                    <span>{{ $total_comment }}</span>
                </div>
                <div class="mb-2">
                    <span>Date Time:</span>
                    <span id="current-time"></span> <br>
                </div>
                <a href="{{ route('logout') }}" class="btn btn-primary mt-2">Logout</a>
            </div>
        </div>
    </section>
    <script>
        function displayCurrentTime() {
            const now = new Date();
            const datePart = now.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            const timePart = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
            document.getElementById('current-time').textContent = `${datePart} ${timePart}`;
        }

        displayCurrentTime();

        setInterval(displayCurrentTime, 1000);
    </script>
@endsection
