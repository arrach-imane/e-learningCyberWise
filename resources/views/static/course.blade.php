@extends('static.components.header')
@section('content')
    @php
        $totalDiscountPrice = $course->getDiscountedPrice();
    @endphp
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h1 class="card-title m-0">{{ $course->course_title }}</h1>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Description</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $course->course_description }}</li>
                        </ul>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Course content</h3>
                        @foreach ($lessons as $lesson)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $lesson->lesson_title }}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Preview This Course</h2>
                        <div class="course-item">
                            <div class="course-video" data-video="{{ $course->course_video_url }}"></div>
                            <div id="videoPlayer" class="mt-3"></div>
                            <h5 class="card-text mt-3 text-center text-success"><strong>
                                    <p>Price</p>
                                    @if ($totalDiscountPrice == 0.0)
                                        <h2><small class="text-success">Free</small></h2>
                                    @else
                                        {{ number_format($totalDiscountPrice, 2) }}$
                                    @endif
                                </strong></h5>
                            <br>
                        </div>
                        @if ($userEnrolled)
                            <form action="{{ url('/lessons/' . $course->course_id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-flat btn-outline-info btn-block mb-3">Enroll
                                    Now</button>
                            </form>
                        @elseif ($userRole == 'guest')
                            <a href="/login"><button type="button"
                                    class="btn btn-flat btn-outline-danger btn-block mb-3">Log-In</button></a>
                        @else
                            <a href="{{ route('checkout.show', $course->course_id) }}" class="btn btn-flat btn-primary btn-block mb-3">Buy Now with Card</a>
                        @endif
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Requirements</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $course->course_requirements }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('static.course_lesson_script.course_script')
<style>
    /* Base hover effect for scaling and shadow */
    .hover-effect {
        transition: transform 0.3s ease, box-shadow 0.3s ease, text-shadow 0.3s ease;
    }

    .hover-effect:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    /* Member card styling with initial shadow */
    .s-member {
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        /* Only transition box-shadow for consistency */
    }

    /* Enhanced shadow on hover */
    .s-member:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .rounded-circle-border {
        border: 1px solid #000000;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>
