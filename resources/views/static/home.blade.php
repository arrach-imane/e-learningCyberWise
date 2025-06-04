@extends('static.components.header')
@section('content')
    <!-- Hero Section -->
    <header class="hero text-center"
        style="background-image: url('{{ asset('photos/1.png') }}'); background-size:cover; background-position:center;">
        <div class="container">
            <h1>Learn Cybersecurity Like a Pro</h1>
            <p class="lead">
                Dive into hands-on labs, real-world attack simulations, and expert-led workshops.<br>
                Join 10,000+ learners mastering the skills to defend networks, applications, and data—on your schedule.
            </p>
            <a href="#courses" class="btn btn-light btn-lg mt-3">Get Started Free</a>
        </div>
    </header>
    

    <div class="container mt-5" id="courses">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-weight-bold">Featured Courses</h2>
            <a href="{{ url('category/1') }}" class="btn btn-link text-dark">View all →</a>
        </div>
        <div class="d-flex overflow-auto gap-3 p-4" style="overflow-x: auto;">
            @foreach ($randomCourses as $course)
                <div class="course border rounded p-2" style="width: 18rem; min-height: 300px;">
                    <a href="{{ url('/courses', ['course_id' => $course->course_id]) }}" class="d-block mb-2">
                        <img src="{{ asset('photos/courses/' . $course->course_thumbnail) }}"
                            alt="{{ $course->course_title }}" class="img-fluid rounded" style="height: 150px;">
                    </a>
                    <hr>
                    <h6 class="font-weight-bold mb-2">
                        <a href="{{ url('/courses', ['course_id' => $course->course_id]) }}" class="text-dark">
                            {{ Str::limit($course->course_title, 20) }}
                        </a>
                    </h6>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-text mb-0">
                            @php
                                $totalDiscountPrice = $course->getDiscountedPrice();
                            @endphp
                            @if ($totalDiscountPrice == 0.0)
                                <span class="badge badge-success text-light font-weight-light"><strong>Free</strong></span>
                            @else
                                <span
                                    class="badge badge-success text-light font-weight-light"><strong>{{ number_format($totalDiscountPrice, 2) }}</strong>$</span>
                                @if ($totalDiscountPrice != $course->course_price)
                                    <small class="text-secondary"><del>{{ $course->course_price }}$</del></small>
                                @endif
                            @endif
                        </h4>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    
    <!-- About Us -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2>About Us</h2>
            <p>
                CyberLearn is a one-stop cybersecurity learning platform that combines expert-led, up-to-date courses with hands-on labs, interactive assessments, and a supportive community to guide you from beginner fundamentals to advanced mastery. You'll learn core topics—from network defense and secure coding to ethical hacking and incident response—through real-world scenarios on virtual machines, reinforce your knowledge with quizzes and verifiable certifications, and track your progress with personalized learning paths. Behind every lesson, a network of experienced mentors and peers is ready to help you troubleshoot challenges and share insights, ensuring you not only understand the theory but can apply it confidently in any environment. Whether you're just starting your cyber journey or sharpening pro-level skills, CyberLearn adapts to your pace and keeps you ahead of evolving threats with continuously refreshed content.
            </p>
        </div>
    </section>
    <footer class="text-center">
        <div class="container">
            <small>&copy; 2024 CyberLearn, All rights reserved.</small>
        </div>
    </footer>
    <style>
        .course img {
            transition: transform 0.2s;
        }

        .course img:hover {
            transform: scale(1.2);
        }

        .course {
            flex: 0 0 auto;
        }
        .hero {
            color: #fff;
            padding: 100px 0;
            background-size: cover;
            background-position: center;
        }
        .hero h1 {
            font-weight: 700;
            font-size: 3rem;
            text-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        .hero .lead {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 1px 4px rgba(0,0,0,0.15);
        }
        .btn-light.btn-lg {
            font-weight: 600;
            border-radius: 30px;
            padding: 0.75rem 2.5rem;
        }
        .bg-light {
            background-color: #f8fafc !important;
        }
        footer {
            background-color: #1E293B;
            color: #94A3B8;
            padding: 20px 0;
        }
    </style>
@endsection
