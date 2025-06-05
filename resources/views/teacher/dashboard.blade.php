@extends('teacher.layout.header')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ url('teacher/dashboard') }}">
                <i class="fa-solid fa-shield-halved text-primary" style="font-size:1.7rem;"></i>
                <span style="font-size:1.4rem; letter-spacing:1px; color:#2563eb; font-family:sans-serif;">Cyber<span style="color:#111;">Wise</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#teacherNavbar" aria-controls="teacherNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="teacherNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('teacher/dashboard') ? ' active' : '' }}" href="{{ url('teacher/dashboard') }}">
                            <i class="fa-solid fa-house-laptop me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('teacher/courses*') ? ' active' : '' }}" href="{{ url('teacher/courses') }}">
                            <i class="fa-solid fa-graduation-cap me-1"></i> Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('teacher/lessons*') ? ' active' : '' }}" href="{{ url('teacher/lessons') }}">
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
    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>Welcome, {{ Auth::user()->full_name }}!</h2>
                <p class="text-muted">Manage your courses and lessons easily.</p>
            </div>
        </div>
        <div class="row g-4 mb-4 justify-content-center">
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
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <div class="mb-2"><i class="ti-user" style="font-size:2rem;color:#2563eb;"></i></div>
                        <h5 class="card-title">User Stats</h5>
                        <h2 class="fw-bold">{{ $totalCourseViews }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .hero {
            color: #252222;
            padding: 80px 0 60px 0;
            background-size: cover;
            background-position: center;
        }
        .hero h1 {
            font-weight: 700;
            font-size: 2.5rem;
        }
        .hero .lead {
            font-size: 1.15rem;
            margin-bottom: 1.5rem;
        }
        .card-title {
            color: var(--primary-color);
            font-weight: 600;
        }
        .card {
            border-radius: 1rem;
        }
        .fw-bold {
            font-weight: 700 !important;
        }
    </style>
@endsection
