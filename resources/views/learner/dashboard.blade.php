@extends('static.components.header')
@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">My Learning</h5>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                            <i class="ti-home mr-2"></i> Dashboard
                        </a>
                        <a href="{{ route('profile.enrolls', ['id' => auth()->id()]) }}" class="list-group-item list-group-item-action">
                            <i class="ti-book mr-2"></i> My Courses
                        </a>
                        <a href="{{ route('profile.show', ['id' => auth()->id()]) }}" class="list-group-item list-group-item-action">
                            <i class="ti-user mr-2"></i> Profile
                        </a>
                        <a href="{{ url('logout') }}" class="list-group-item list-group-item-action text-danger">
                            <i class="ti-power-off mr-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <!-- Welcome Section -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title">Welcome back, {{ auth()->user()->full_name }}!</h4>
                    <p class="text-muted">Continue your learning journey from where you left off.</p>
                </div>
            </div>

            <!-- Enrolled Courses -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">My Courses</h5>
                    @if($enrolledCourses->count() > 0)
                        <div class="row">
                            @foreach($enrolledCourses as $enrollment)
                                @php
                                    $course = $enrollment->course;
                                    $progress = $courseProgress[$course->course_id]['progress'] ?? 0;
                                @endphp
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('photos/courses/' . $course->course_thumbnail) }}"
                                             class="card-img-top"
                                             alt="{{ $course->course_title }}"
                                             style="height: 160px; object-fit: cover;">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $course->course_title }}</h6>
                                            <div class="progress mb-3" style="height: 5px;">
                                                <div class="progress-bar bg-success"
                                                     role="progressbar"
                                                     style="width: {{ $progress }}%"
                                                     aria-valuenow="{{ $progress }}"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100">
                                                </div>
                                            </div>
                                            <small class="text-muted">{{ number_format($progress, 0) }}% Complete</small>
                                            <div class="mt-3">
                                                <a href="{{ url('courses/' . $course->course_id) }}"
                                                   class="btn btn-primary btn-sm">Continue Learning</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="ti-book text-muted" style="font-size: 48px;"></i>
                            <h5 class="mt-3">No courses enrolled yet</h5>
                            <p class="text-muted">Start your learning journey by enrolling in a course.</p>
                            <a href="{{ url('category/1') }}" class="btn btn-primary">Browse Courses</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 10px;
    }
    .list-group-item {
        border: none;
        padding: 0.75rem 1rem;
    }
    .list-group-item.active {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    .progress {
        background-color: #e9ecef;
        border-radius: 10px;
    }
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    .btn-primary:hover {
        background-color: var(--primary-hover);
        border-color: var(--primary-hover);
    }
</style>
@endsection
