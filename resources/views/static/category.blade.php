@extends('static.components.header')
@section('content')
    @include('static.css.style_category')

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Filter by</h5>
                        <hr>
                        <form method="get" action="{{ url()->current() }}">
                            <div class="form-group row">
                                <label for="sortSelect" class="col-sm-4 col-form-label">

                                    <img class="img-fluid px-2" style="width: 50px;" src="/assets/Icons/sort.png"
                                        alt="Sort Icon">:
                                </label>
                                <div class="col-sm-8">
                                    <select name="sort" id="sortSelect" required aria-invalid="false"
                                        aria-label="Sort options" class="form-control form-control-lg"
                                        onchange="this.form.submit()">
                                        <option value="last_update"
                                            {{ request('sort') === 'last_update' ? 'selected' : '' }}
                                            aria-label="Sort by last update">Last Update</option>
                                        <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}
                                            aria-label="Sort by newest">Newest</option>
                                        <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}
                                            aria-label="Sort by oldest">Oldest</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-6 mt-2">
                <div class="card">
                    <div class="card-body">
                        @foreach ($courses as $course)
                            @php
                                $totalDiscountPrice = $course->getDiscountedPrice();
                            @endphp
                            <a href="{{ url('courses', ['course_id' => $course->course_id]) }}">
                                <div class="row g-0 align-items-center mb-3">
                                    <div class="col-md-3">
                                        <img class="img-fluid rounded-start"
                                            src="{{ asset('photos/courses/' . $course->course_thumbnail) }}" alt="Thumbnail"
                                            style="height: auto; width: auto; object-fit: cover;">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h2 class="card-title">{{ $course->course_title }}</h2>
                                            <p class="card-text text-muted">
                                                {{ substr($course->course_description, 0, 200) }}...
                                            </p>
                                            <h2 class="card-text">
                                                @if ($totalDiscountPrice == 0.0)
                                                    <small class="text-success"><strong>Free</strong></small>
                                                @else
                                                    <small
                                                        class="text-success"><strong>{{ number_format($totalDiscountPrice, 2) }}</strong>$</small>

                                                    @if ($totalDiscountPrice != $course->course_price)
                                                        <hr>
                                                        <h5 class="text-success"><del>{{ $course->course_price }}$</del>
                                                        </h5>
                                                    @endif
                                                @endif
                                            </h2>
                                            <p class="card-text"><small class="text-muted">Last updated:
                                                    {{ $course->updated_at->diffForHumans() }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
