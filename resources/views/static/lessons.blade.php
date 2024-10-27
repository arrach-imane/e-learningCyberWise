@extends('static.components.header')
@section('content')
    <div class="container mt-2">

        <div class="col-lg-12 mt-2">
            <a href="{{ route('profile.enrolls', ['id' => auth()->id()]) }}"><button class="btn btn-outline-danger my-2 my-sm-0"
                    type="button">Back</button></a>

            <div class="card mt-2">
                <div class="card-body">
                    <h5 class="d-inline-block mb-3 mr-auto">Competition</h5>
                    <h5 class="float-right mb-3">Lessons Count {{ $totalLessons }}</h5>
                    <div class="progress_area">
                        <div class="progress" style="height: 28px;">
                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
                                role="progressbar" aria-valuenow="{{ $competitionPercentage }}" aria-valuemin="0"
                                aria-valuemax="100" style="width: {{ $competitionPercentage }}%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <header class="course-header">
                        <h1 class="display-7">
                            <ins>
                                @if ($lessons->isNotEmpty())
                                    {{ $lessons->first()->course_title }}
                                @else
                                    No Lessons Available
                                @endif
                            </ins>
                        </h1>
                    </header>
                    <div id="accordion4" class="according accordion-s3 gradient-bg">
                        @foreach ($lessons as $index => $lesson)
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <a class="card-link flex-fill mr-2" style="width: 95%;" data-toggle="collapse"
                                            href="#collapse{{ $index }}"
                                            aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $index }}">
                                            {{ $lesson->lesson_title }}
                                        </a>
                                        <input type="checkbox" class="lesson-checkbox mr-2" style="width: 5%;"
                                            data-lesson-id="{{ $lesson->lesson_id }}" {{ $lesson->completed ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div id="collapse{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}"
                                    data-parent="#accordion4">
                                    <div class="card-body">
                                        <div class="course-video" data-video="{{ $lesson->lesson_video }}"
                                            id="videoPlayer{{ $index }}"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        input[type="checkbox"] {
            margin-right: auto;
            margin-left: auto;
            display: block;
            width: 20px;
            height: 20px;
        }

        .course-header {
            flex: 0 0 10%;
            text-align: center;
            margin-bottom: 2rem;
        }

        .course-header .display-2 {
            /* Styles for the h1 tag */
            font-size: 3rem;
            /* Adjust size as needed */
            font-weight: bold;
        }

        .course-header ins {
            /* Styles for the underline effect */
            text-decoration: none;
            border-bottom: 2px solid currentColor;
            /* Creates an underline effect */
            width:
        }
    </style>
@endsection
@include('static.course_lesson_script.lesson_script')
