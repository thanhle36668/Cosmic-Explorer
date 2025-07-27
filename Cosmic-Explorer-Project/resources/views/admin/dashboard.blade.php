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
                <p class="mb-4">Hello, {{ auth()->user()->name }}!</p>
                <h1>Date now at:</h1>
                <p id="current-time"></p>
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
