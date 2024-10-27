@extends('admin.layout.header')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="header-title">Add Lessons</h4>
                    <form class="needs-validation" action="{{ url('admin/lessons-add') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <br>
                            <div class="col-md-4 mb-4">
                                <label>Choose Course</label>
                                <select name="course_id" class="custom-select h-75 d-inline-block" required>
                                    <option selected value="">Select Course</option>
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
                        <a href="{{ url('admin/lessons') }}"><button type="button"
                                class="btn btn-outline-danger mb-3">Cancel</button></a>
                        <button type="submit" class="btn btn-outline-success mb-3">Add New</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="error-message-container"></div>
@endsection
@include('admin.courses.script')
