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
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card border border-success">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-uppercase font-weight-bold">Data Table Lessons</h3>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown ml-3">
                                        <button class="btn btn-flat btn-success dropdown-toggle rounded-left" type="button"
                                            data-toggle="dropdown">
                                            Lessons
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ url('teacher/lessons-add') }}" class="dropdown-item">
                                                <i class="fa fa-plus-square"></i> Add
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="data-tables mt-3">
                                <div class="table-responsive">
                                    <table id="example" class="display table table-hover progress-table text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th width="0%">ID</th>
                                                <th width="10%">Course</th>
                                                <th width="10%">Title</th>
                                                <th width="0%">Duration</th>
                                                <th width="15%">Video</th>
                                                <th width="0%">Created_at</th>
                                                <th width="0%">Updated_at</th>
                                                <th width="0%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lessons as $lesson)
                                                <tr data-id="{{ $lesson->lesson_id }}">
                                                    <td>{{ $lesson->lesson_id }}</td>
                                                    <td>{{ $lesson->course_title }}</td>
                                                    </td>
                                                    <td>{{ $lesson->lesson_title }}
                                                    </td>
                                                    <td>{{ $lesson->lesson_duration }}h</td>
                                                    <td>{{ $lesson->lesson_video }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($lesson->created_at)->format('d/m/Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($lesson->updated_at)->format('d/m/Y') }}
                                                    </td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3">
                                                                <a href="{{ url('teacher/lessons/detail', ['id' => $lesson->lesson_id]) }}"
                                                                    class="text-info">
                                                                    <div class="icon-container">
                                                                        <span class="ti-eye"></span>
                                                                        <span class="icon-name text-info">Details</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="mr-3">
                                                                <a href="{{ url('teacher/lessons/update', ['id' => $lesson->lesson_id]) }}"
                                                                    class="text-primary">
                                                                    <div class="icon-container">
                                                                        <span class="ti-pencil-alt"></span>
                                                                        <span class="icon-name text-primary">Edit</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var globalUrl = '{{ route('teacher.lessons.delete') }}';
    </script>
@endsection
