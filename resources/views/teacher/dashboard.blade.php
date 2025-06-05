@extends('teacher.layout.header')
@section('content')
    <!-- Hero Section -->
    <header class="hero text-center">
        <div class="container">
            <h1>Welcome to your Teacher Dashboard</h1>
            <p class="lead">
                Here you can find your course and lesson statistics, as well as tools to manage your educational content.
            </p>
        </div>
    </header>
    <div class="container mt-5">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <div class="mb-2">
                            <i class="ti-bookmark-alt" style="font-size:2rem;color: var(--primary-color);"></i>
                        </div>
                        <h5 class="card-title">Total Courses</h5>
                        <h2 class="fw-bold">{{ $totalcourses }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <div class="mb-2">
                            <i class="ti-wallet" style="font-size:2rem;color: var(--primary-color);"></i>
                        </div>
                        <h5 class="card-title">Total Lessons</h5>
                        <h2 class="fw-bold">{{ $totallessons }}</h2>
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
