@extends('teacher.layout.header')
@section('content')
<div class="container">
    <div class="col-12">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="header-title">Detail Courses</h4>
                <form class="needs-validation">
                    <div class="form-row">
                        <br>
                        <div class="col-md-12 mb-4">
                            <label>Choose Category</label>
                            <select name="category_id" class="custom-select h-75 d-inline-block" {{ auth()->user()->role == 'teacher' ? '' : 'disabled' }}>
                                <option disabled value="" >Select Category</option>
                                @foreach ($categories as $category)
                                    <option disabled value="{{ $category->category_id }}"
                                        {{ $category->category_id == $course->category_id ? 'selected' : '' }}>
                                        {{ $category->category_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="visibility">Choose Visibility</label>
                            <select name="course_visibility" class="custom-select h-75 d-inline-block" {{ auth()->user()->role == 'teacher' ? '' : 'disabled' }}>
                                <option disabled value="true" {{ $course->course_visibility == 'true' ? 'selected' : '' }}>Public
                                </option>
                                <option disabled value="false" {{ $course->course_visibility == 'false' ? 'selected' : '' }}>
                                    Private</option>
                            </select>
                        </div>
                        <br>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Title</label>
                            <input name="course_title" value="{{ $course->course_title }}" type="text" class="form-control"
                                id="validationCustom01" placeholder="Title" readonly>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom02">Price</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                                <input name="course_price" value="{{ $course->course_price }}" type="number" class="form-control"
                                    id="validationCustom02" placeholder="Price" readonly>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom02">Discount</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">%</span>
                                    <span class="input-group-text">000</span>
                                </div>
                                <input name="course_discount" value="{{ $course->course_discount }}" type="number" class="form-control"
                                    id="validationCustom02" placeholder="Discount" readonly>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="youtubeUrl">YouTube Video URL</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">https://</span>
                                </div>
                                <input name="course_video_url" value="{{ $course->course_video_url }}" type="text" id="videoUrlInput"
                                    class="form-control" placeholder="Paste YouTube Video URL" readonly
                                    onblur="loadVideo()">
                            </div>
                            <div id="videoPlayer" class="mt-3"></div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="thumbnailImageInput">Thumbnail Image <= 1920x1080</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="course_thumbnail" type="file" class="custom-file-input"
                                                id="thumbnailImageInput" accept="image/*" onchange="previewThumbnailImage()"
                                                disabled>
                                            <label class="custom-file-label" for="thumbnailImageInput">
                                                {{ $course->course_thumbnail }}
                                            </label>
                                        </div>
                                    </div>
                                    @if (old('course_thumbnail'))
                                        <p style="font-size: 15px; color: #d5091a;">
                                            Please Choose Your Thumbnail Again! The File Name of Your Old
                                            Thumbnail: "{{ old('course_thumbnail') }}"
                                        </p>
                                    @endif
                                    <div id="thumbnailPreview" class="mt-3"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationCustom02">Requirements</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Requirements</span>
                                </div>
                                <textarea name="course_requirements" class="form-control" aria-label="With textarea" readonly>{{ $course->course_requirements }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom02">Description</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Description</span>
                                </div>
                                <textarea name="course_description" class="form-control" aria-label="With textarea" readonly>{{ $course->course_description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('teacher/courses') }}"><button type="button"
                            class="btn btn-outline-danger mb-3">Back</button></a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@include('teacher.courses.script')
