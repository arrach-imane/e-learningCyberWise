@extends('static.components.header')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="card profile-card-5">
                    <div class="card-img-block">
                        <img class="card-img-top"
                            src="{{ $userteacher->user_photo ? asset('upload/' . basename($userteacher->user_photo)) : asset('https://img.icons8.com/bubbles/100/000000/user.png') }}"
                            alt="{{ $userteacher->full_name }}">
                    </div>
                    <div class="card-body pt-0">
                        <h5 class="card-title">{{ $userteacher->full_name }}</h5>
                        <p class="card-text">{{ $userteacher->role }}</p>
                        <p class="mt-3 w-100 float-left text-center"><strong>Social media</strong></p>
                        <div class="social-links">
                            <a href="https://facebook.com/{{ $userteacher->facebook }}" class="social-icon">
                                <img src="{{ url('assets/GIF/FB.gif') }}" alt="Facebook" width="50px">
                            </a>
                            &nbsp;&nbsp;
                            <a href="https://t.me/{{ $userteacher->telegram }}" class="social-icon">
                                <img src="{{ url('assets/GIF/TG.gif') }}" alt="Telegram" width="50px">
                            </a>
                            &nbsp;&nbsp;
                            <a href="https://youtube.com/{{ $userteacher->youtube }}" class="social-icon">
                                <img src="{{ url('assets/GIF/YT.gif') }}" alt="YouTube" width="50px">
                            </a>
                            <!-- Add more social icons as needed -->
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    @foreach ($userteacher->courses as $userCourse)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card border-0 shadow-sm h-100">
                                <a href="{{ url('/courses', ['course_id' => $userCourse->course_id]) }}">
                                    <img src="{{ asset('photos/courses/' . $userCourse->course_thumbnail) }}"
                                        alt="{{ $userCourse->course_title }}" class="card-img-top rounded"
                                        style="height: 150px; object-fit: cover;">
                                </a>
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <a href="{{ url('/courses', ['course_id' => $userCourse->course_id]) }}"
                                            class="text-dark">{{ Str::limit($userCourse->course_title, 20) }}</a>
                                    </h6>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        @php
                                            $totalDiscountPrice = $userCourse->getDiscountedPrice();
                                        @endphp
                                        <h4 class="card-text mb-0">
                                            @if ($totalDiscountPrice == 0.0)
                                                <span class="badge badge-success"><strong>Free</strong></span>
                                            @else
                                                <span
                                                    class="badge badge-success"><strong>{{ number_format($totalDiscountPrice, 2) }}</strong>$</span>
                                                @if ($totalDiscountPrice != $userCourse->course_price)
                                                    <small
                                                        class="text-muted"><del>{{ $userCourse->course_price }}$</del></small>
                                                @endif
                                            @endif
                                        </h4>
                                    </div>
                                    <p class="card-text text-muted">{{ Str::limit($userCourse->course_description, 100) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .profile-card-5 {
        margin-top: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .profile-card-5:hover {
        transform: translateY(-5px);
    }

    .profile-card-5 .btn {
        border-radius: 2px;
        text-transform: uppercase;
        font-size: 12px;
        padding: 7px 20px;
    }

    .profile-card-5 .card-img-block {
        width: 91%;
        margin: 0 auto;
        position: relative;
        top: -20px;
    }

    .profile-card-5 .card-img-block img {
        align-items: center;
        width: 200px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.63);
        transition: transform 0.3s ease;
    }

    .profile-card-5:hover .card-img-block img {
        transform: scale(1.1);
    }

    .profile-card-5 h5 {
        color: #4e5e30;
        font-weight: 600;
    }

    .profile-card-5 p {
        font-size: 14px;
        font-weight: 300;
    }

    .profile-card-5 .btn-primary {
        background-color: #4e5e30;
        border-color: #4e5e30;
    }
</style>
