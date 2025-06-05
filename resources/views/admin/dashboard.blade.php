@extends('admin.layout.header')
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ url('admin/dashboard') }}">
            <i class="fa-solid fa-shield-halved text-primary" style="font-size:1.7rem;"></i>
            <span style="font-size:1.4rem; letter-spacing:1px; color:#2563eb; font-family:sans-serif;">Cyber<span style="color:#111;">Wise</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('admin/dashboard') ? ' active' : '' }}" href="{{ url('admin/dashboard') }}">
                        <i class="fa-solid fa-house-laptop me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('admin/users') ? ' active' : '' }}" href="{{ url('admin/users') }}">
                        <i class="fa-solid fa-user-group me-1"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('admin/courses*') ? ' active' : '' }}" href="{{ url('admin/courses') }}">
                        <i class="fa-solid fa-graduation-cap me-1"></i> Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('admin/lessons*') ? ' active' : '' }}" href="{{ url('admin/lessons') }}">
                        <i class="fa-regular fa-lightbulb me-1"></i> Lessons
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ url('logout') }}">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="py-4">
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="mb-2"><i class="ti-user" style="font-size:2rem;color:#2563eb;"></i></div>
                    <h5 class="card-title">Total Users</h5>
                    <h2 class="fw-bold">{{ $totalusers }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="mb-2"><i class="ti-book" style="font-size:2rem;color:#2563eb;"></i></div>
                    <h5 class="card-title">Total Courses</h5>
                    <h2 class="fw-bold">{{ $totalcourses }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="mb-2"><i class="ti-video-camera" style="font-size:2rem;color:#2563eb;"></i></div>
                    <h5 class="card-title">Total Lessons</h5>
                    <h2 class="fw-bold">{{ $totallessons }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-0 pb-0">
                    <h6 class="mb-0">User Distribution</h6>
                </div>
                <div class="card-body">
                    <canvas id="userStatistics" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-0 pb-0">
                    <h6 class="mb-0">Platform Overview</h6>
                </div>
                <div class="card-body">
                    <canvas id="platformOverview" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // User Statistics Chart
    new Chart(document.getElementById('userStatistics'), {
        type: 'bar',
        data: {
            labels: ['Students', 'Teachers', 'Admins'],
            datasets: [{
                data: [{{ $totalusers }}, {{ $totalusers * 0.2 }}, {{ $totalusers * 0.05 }}],
                backgroundColor: ['#2563eb', '#3b82f6', '#60a5fa'],
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { display: false } },
                x: { grid: { display: false } }
            }
        }
    });

    // Platform Overview Chart
    new Chart(document.getElementById('platformOverview'), {
        type: 'doughnut',
        data: {
            labels: ['Courses', 'Lessons', 'Categories'],
            datasets: [{
                data: [{{ $totalcourses }}, {{ $totallessons }}, {{ $totalcategory ?? 0 }}],
                backgroundColor: ['#2563eb', '#3b82f6', '#60a5fa']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { padding: 20, usePointStyle: true }
                }
            },
            cutout: '70%'
        }
    });
});
</script>
@endsection
