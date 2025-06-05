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
    <div class="container">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="header-title">Add Lessons</h4>
                    <form class="needs-validation" action="{{ url('teacher/lessons-add') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <br>
                            <div class="col-md-4 mb-4">
                                <label for="course_id">Choose Course</label>
                                <select name="course_id" id="course_id" class="custom-select h-75 d-inline-block" required>
                                    <option value="" selected>Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->course_id }}"
                                            {{ old('course_id') == $course->course_id ? 'selected' : '' }}>
                                            {{ $course->course_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <br>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Title</label>
                                <input name="lesson_title" value="{{ old('lesson_title') }}" type="text" class="form-control"
                                    id="validationCustom01" placeholder="Title" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Duration</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Hour</span>
                                        <span class="input-group-text">0h</span>
                                    </div>
                                    <input name="lesson_duration" value="{{ old('lesson_duration') }}" type="number" class="form-control"
                                        id="validationCustom02" placeholder="lesson_duration" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="youtubeUrl">YouTube Video URL</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">https://</span>
                                    </div>
                                    <input name="lesson_video" value="{{ old('lesson_video') }}" type="text" id="videoUrlInput"
                                        class="form-control" placeholder="Paste YouTube Video URL" required
                                        onblur="loadVideo()">
                                </div>
                                <div id="videoPlayer"></div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('teacher/lessons') }}"><button type="button"
                                class="btn btn-outline-danger mb-3">Cancel</button></a>
                        <button type="submit" class="btn btn-outline-success mb-3">Add New</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div id="error-message-container"></div> --}}
@endsection
@include('teacher.courses.script')
