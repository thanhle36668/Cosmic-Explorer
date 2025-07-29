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
                <div class="row">
                    <h5 class="col-12"><i class="fas fa-angle-right left"></i>
                        Collections (Planet - Constellation -
                        Observatory)</h5>
                    <div class="col-4">
                        <span>Total Planet:</span>
                        <span>{{ $total_planet }}</span>
                    </div>
                    <div class="col-4">
                        <span>Total Constellation:</span>
                        <span>{{ $total_constellation }}</span>
                    </div>
                    <div class="col-4">
                        <span>Total Observatory:</span>
                        <span>{{ $total_observatory }}</span>
                    </div>
                    <h5 class="col-12 mt-2"><i class="fas fa-angle-right left"></i>
                        Post (News)</h5>
                    <div class="col-4">
                        <span>Total Post (News):</span>
                        <span>{{ $total_post }}</span>
                    </div>
                    <div class="col-4">
                        <span>Total Comment:</span>
                        <span>{{ $total_comment }}</span>
                    </div>
                    <h5 class="col-12 mt-2">
                        <i class="fas fa-angle-right left"></i>
                        Post (Discovery)
                    </h5>
                    <div class="col-4">
                        <span>Total Post (Discovery):</span>
                        <span>{{ $total_post_discovery }}</span>
                    </div>
                    <h5 class="col-12 mt-2">
                        <i class="fas fa-angle-right left"></i>
                        Contact
                    </h5>
                    <div class="col-4">
                        <span>Total Messages:</span>
                        <span>{{ $total_messages }}</span>
                    </div>
                    <div class="col-4">
                        <span>Total Subscribe:</span>
                        <span>{{ $total_subscribe }}</span>
                    </div>
                    <h5 class="col-12 mt-2">
                        <i class="fas fa-angle-right left"></i>
                        Educational
                    </h5>
                    <div class="col-4">
                        <span>Total Book:</span>
                        <span>{{ $total_book }}</span>
                    </div>
                    <div class="col-4">
                        <span>Total Video:</span>
                        <span>{{ $total_video }}</span>
                    </div>
                </div>
                <div class="mt-2">
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
