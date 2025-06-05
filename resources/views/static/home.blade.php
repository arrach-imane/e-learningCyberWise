@extends('static.components.header')
@section('content')
    <!-- Hero Section -->
    <header class="hero text-center" style="background: #f8f9fa;">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge mb-4">
                    <span class="badge bg-primary-soft">#1 Cybersecurity Learning Platform</span>
                </div>
                <h1 class="display-4 fw-bold mb-4" style="color:#222;">Master Cybersecurity with CyberWise</h1>
                <p class="lead mb-5" style="color:#6b7280;">
                    Join the elite community of cybersecurity professionals. Learn from industry experts,<br>
                    practice in real-world environments, and earn recognized certifications.
                </p>
                <div class="hero-buttons">
                    <a href="{{ url('signup') }}" class="btn btn-cyber btn-lg me-3">Start Learning Free</a>
                </div>
                <div class="hero-stats mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <h3>10K+</h3>
                                <p>Active Learners</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <h3>500+</h3>
                                <p>Hands-on Labs</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <h3>50+</h3>
                                <p>Expert Instructors</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <h3>95%</h3>
                                <p>Success Rate</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Features Section -->
    <section class="features py-5" style="background: #fff; color: #222;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Why Choose CyberWise?</h2>
                <p class="section-subtitle">Comprehensive cybersecurity training for every skill level</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3>Hands-on Labs</h3>
                        <p>Practice in real-world environments with our virtual labs and simulations.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3>Industry Certifications</h3>
                        <p>Earn recognized certifications to boost your career prospects.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Expert Community</h3>
                        <p>Connect with industry professionals and fellow learners.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Courses -->
    <section class="courses py-5" id="courses" style="background: #f8f9fa; color: #222;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="section-title mb-2">Featured Courses</h2>
                    <p class="section-subtitle">Master the most in-demand cybersecurity skills</p>
                </div>
                <a href="{{ url('category/1') }}" class="btn btn-outline-cyber">View All Courses</a>
            </div>
            <div class="row g-4">
                @foreach ($randomCourses as $course)
                    <div class="col-md-4">
                        <div class="course-card">
                            <div class="course-image">
                                <img src="{{ asset('photos/courses/' . $course->course_thumbnail) }}"
                                    alt="{{ $course->course_title }}" class="img-fluid">
                                <div class="course-overlay">
                                    <a href="{{ url('/courses', ['course_id' => $course->course_id]) }}" class="btn btn-cyber">View Course</a>
                                </div>
                            </div>
                            <div class="course-content">
                                <h3 class="course-title">
                                    <a href="{{ url('/courses', ['course_id' => $course->course_id]) }}" style="color: #222;">
                                        {{ Str::limit($course->course_title, 50) }}
                                    </a>
                                </h3>
                                <div class="course-meta">
                                    <span><i class="fas fa-clock"></i> {{ $course->duration ?? 'Self-paced' }}</span>
                                    <span><i class="fas fa-signal"></i> {{ $course->level ?? 'All Levels' }}</span>
                                </div>
                                <div class="course-price">
                                    @php
                                        $totalDiscountPrice = $course->getDiscountedPrice();
                                    @endphp
                                    @if ($totalDiscountPrice == 0.0)
                                        <span class="price-free">Free</span>
                                    @else
                                        <span class="price-current">${{ number_format($totalDiscountPrice, 2) }}</span>
                                        @if ($totalDiscountPrice != $course->course_price)
                                            <span class="price-old">${{ $course->course_price }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials py-5" style="background: #fff; color: #222;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Success Stories</h2>
                <p class="section-subtitle">What our learners say about CyberWise</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p>"CyberWise helped me transition from IT support to a cybersecurity analyst role. The hands-on labs were invaluable."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="{{ asset('photos/testimonials/user1.jpg') }}" alt="Sarah Johnson" class="author-image">
                            <div class="author-info">
                                <h4>Sarah Johnson</h4>
                                <p>Security Analyst at TechCorp</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p>"The quality of instruction and real-world scenarios prepared me for my current role as a penetration tester."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="{{ asset('photos/testimonials/user2.jpg') }}" alt="Michael Chen" class="author-image">
                            <div class="author-info">
                                <h4>Michael Chen</h4>
                                <p>Penetration Tester at SecureNet</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p>"The structured learning paths and expert support helped me earn my CISSP certification in just 6 months."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="{{ asset('photos/testimonials/user3.jpg') }}" alt="Emily Rodriguez" class="author-image">
                            <div class="author-info">
                                <h4>Emily Rodriguez</h4>
                                <p>Security Consultant at CyberDefense</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta py-5" style="background: #f8f9fa; color: #222;">
        <div class="container">
            <div class="cta-content text-center">
                <h2>Ready to Start Your Cybersecurity Journey?</h2>
                <p class="lead mb-4">Join thousands of learners building their future in cybersecurity</p>
                <a href="{{ url('signup') }}" class="btn btn-cyber btn-lg">Get Started Free</a>
            </div>
        </div>
    </section>

    <style>
        body {
            background: #f8f9fa;
            color: #222;
            font-family: 'Poppins', Arial, sans-serif;
        }
        /* Hero Section */
        .hero {
            color: #222;
            padding: 120px 0 80px 0;
            position: relative;
            overflow: hidden;
            background: #f8f9fa;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero-badge {
            display: inline-block;
        }
        .bg-primary-soft {
            background-color: rgba(37, 99, 235, 0.1);
            color: #2563eb;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 500;
        }
        .hero h1 {
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: #222;
            text-shadow: 0 2px 4px rgba(0,0,0,0.04);
        }
        .hero .lead {
            font-size: 1.25rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            color: #6b7280;
            text-shadow: 0 1px 2px rgba(0,0,0,0.03);
        }
        .hero-buttons .btn-cyber {
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(37,99,235,0.08);
        }
        .hero-buttons .btn-cyber:hover {
            background: #1746a0;
            color: #fff;
            transform: translateY(-2px);
        }
        .stat-item {
            text-align: center;
            padding: 1rem;
        }
        .stat-item h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2563eb;
            margin-bottom: 0.5rem;
        }
        .stat-item p {
            color: #6b7280;
            margin: 0;
        }

        /* Features Section */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #222;
            margin-bottom: 1rem;
        }
        .section-subtitle {
            color: #6b7280;
            font-size: 1.1rem;
        }
        .feature-card {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.04);
            transition: transform 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            background: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        .feature-icon i {
            font-size: 1.5rem;
            color: #fff;
        }
        .feature-card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #222;
        }
        .feature-card p {
            color: #6b7280;
            margin: 0;
        }

        /* Course Cards */
        .course-card {
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.04);
            transition: transform 0.3s ease;
        }
        .course-card:hover {
            transform: translateY(-5px);
        }
        .course-image {
            position: relative;
            overflow: hidden;
        }
        .course-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .course-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(37, 99, 235, 0.92);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .course-card:hover .course-overlay {
            opacity: 1;
        }
        .course-content {
            padding: 1.5rem;
        }
        .course-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .course-title a {
            color: #222;
            text-decoration: none;
        }
        .course-meta {
            display: flex;
            gap: 1rem;
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        .course-price {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .price-current {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2563eb;
        }
        .price-old {
            color: #6b7280;
            text-decoration: line-through;
        }
        .price-free {
            font-size: 1.25rem;
            font-weight: 600;
            color: #10b981;
        }

        /* Testimonials */
        .testimonial-card {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.04);
        }
        .testimonial-content {
            margin-bottom: 1.5rem;
        }
        .testimonial-content p {
            color: #222;
            font-style: italic;
            margin: 0;
        }
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .author-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        .author-info h4 {
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
            color: #222;
        }
        .author-info p {
            color: #6b7280;
            margin: 0;
            font-size: 0.9rem;
        }

        /* CTA Section */
        .cta-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .cta-content .lead {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }
        .btn-cyber {
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(37,99,235,0.08);
        }
        .btn-cyber:hover, .btn-outline-cyber:hover {
            background: #1746a0;
            color: #fff;
            transform: translateY(-2px);
        }
        .btn-outline-cyber {
            background: transparent;
            color: #2563eb;
            border: 2px solid #2563eb;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-outline-cyber:focus, .btn-cyber:focus {
            outline: none;
            box-shadow: 0 0 0 2px #2563eb44;
        }
    </style>
@endsection
