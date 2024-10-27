@extends('static.components.header')
@section('content')

    <div class="container">
        <hr>
        <h4 class="mt-4 mb-3">Search Results For: "{{ Request::get('search') }}" (<b
                class="text-success">{{ count($courses) }}</b> found)</h4>
        <hr>
        <div class="row search-result">
            @forelse ($courses as $course)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <a href="{{ url('courses', ['course_id' => $course->course_id]) }}"><img
                                class="card-img-top img-fluid"
                                src="{{ asset('photos/courses/' . $course->course_thumbnail) }}" alt="Course Image"></a>
                        <div class="card-body">
                            <hr>
                            <a href="{{ url('courses', ['course_id' => $course->course_id]) }}">
                                <h5 class="card-title">{{ $course->course_title }}
                            </a></h5>
                            @php
                                $totalDiscountPrice = $course->getDiscountedPrice();
                            @endphp
                            <h4 class="card-text mb-0">
                                <hr>
                                @if ($totalDiscountPrice == 0.0)
                                    <span
                                        class="badge badge-success text-light font-weight-light"><strong>Free</strong></span>
                                @else
                                    <span
                                        class="badge badge-success text-light font-weight-light"><strong>{{ number_format($totalDiscountPrice, 2) }}</strong>$</span>
                                    @if ($totalDiscountPrice != $course->course_price)
                                        <small class="text-secondary"><del>{{ $course->course_price }}$</del></small>
                                    @endif
                                @endif
                                <hr>
                            </h4>
                            <p class="card-text"><small class="text-muted">Last updated:
                                    {{ $course->updated_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 mt-4">
                    <div class="alert alert-info" role="alert">
                        No results found for your search criteria.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
