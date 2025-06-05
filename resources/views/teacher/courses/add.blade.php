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
                    <h4 class="header-title">Add Courses</h4>
                    <form class="needs-validation" action="{{ url('teacher/course-add') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <br>
                            <div class="col-md-6 mb-4">
                                <label>Choose Category</label>
                                <select name="category_id" class="custom-select h-75 d-inline-block" required>
                                    <option selected value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}"
                                            {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                                            {{ $category->category_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="visibility">Choose Visibility</label>
                                <select name="course_visibility" class="custom-select h-75 d-inline-block">
                                    <option value="true" {{ old('course_visibility') == 'true' ? 'selected' : '' }}>Public
                                    </option>
                                    <option value="false" {{ old('course_visibility') == 'false' ? 'selected' : '' }}>
                                        Private
                                    </option>
                                </select>
                            </div>
                            <br>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Title</label>
                                <input name="course_title" value="{{ old('course_title') }}" type="text"
                                    class="form-control" id="validationCustom01" placeholder="Title" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="priceInput">Price</label>
                                <input name="course_price" value="{{ old('course_price') }}" type="number" min="0" step="0.01"
                                    class="form-control" id="priceInput" placeholder="Price" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="discountInput">Discount (%)</label>
                                <input name="course_discount" value="{{ old('course_discount') }}" type="number" min="0" max="100" step="1"
                                    class="form-control" id="discountInput" placeholder="Discount">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="youtubeUrl">YouTube Video URL</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">https://</span>
                                    </div>
                                    <input name="course_video_url" value="{{ old('course_video_url') }}" type="text"
                                        id="videoUrlInput" class="form-control" placeholder="Paste YouTube Video URL"
                                        required onblur="loadVideo()">
                                </div>
                                <div id="videoPlayer"></div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="thumbnailImageInput">Thumbnail Image <= 1920x1080</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="course_thumbnail" type="file" class="custom-file-input"
                                                    id="thumbnailImageInput" accept="image/*"
                                                    onchange="previewOrClearThumbnailImage()">
                                                <label class="custom-file-label" for="thumbnailImageInput">
                                                    Choose file
                                                </label>
                                            </div>
                                        </div>
                                        <div id="thumbnailPreview" class="mt-3"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Requirements</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Requirements</span>
                                    </div>
                                    <textarea name="course_requirements" class="form-control" aria-label="With textarea" required>{{ old('course_requirements') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Description</label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Description</span>
                                    </div>
                                    <textarea name="course_description" class="form-control" aria-label="With textarea" required>{{ old('course_description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('teacher/courses') }}"><button type="button"
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
