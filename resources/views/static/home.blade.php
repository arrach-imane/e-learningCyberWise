@extends('static.components.header')
@section('content')
    <!-- Hero Section -->
    <header class="hero text-center">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge mb-4">
                    <span class="badge bg-primary-soft">#1 Cybersecurity Learning Platform</span>
                </div>
                <h1 class="display-4 fw-bold mb-4">Master Cybersecurity with CyberWise</h1>
                <p class="lead mb-5">
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
    <section class="features py-5" style="background: #fff; color: #14213d;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" style="color:#14213d;">Why Choose CyberWise?</h2>
                <p class="section-subtitle" style="color:#4b5563;">Comprehensive cybersecurity training for every skill level</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon feature-icon-svg">
                            <!-- SVG: Laptop/Terminal -->
                            <svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="4" y="8" width="24" height="16" rx="2" fill="#2563eb"/><rect x="8" y="12" width="16" height="8" rx="1" fill="#fff"/><rect x="12" y="20" width="8" height="2" rx="1" fill="#2563eb"/></svg>
                        </div>
                        <h3>Hands-on Labs</h3>
                        <p>Practice in real-world environments with our virtual labs.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon feature-icon-svg">
                            <!-- SVG: Certificate/Medal -->
                            <svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16" cy="14" r="8" fill="#2563eb"/><circle cx="16" cy="14" r="5" fill="#fff"/><rect x="13" y="22" width="6" height="6" rx="1" fill="#2563eb"/><rect x="9" y="22" width="4" height="6" rx="1" fill="#60a5fa"/><rect x="19" y="22" width="4" height="6" rx="1" fill="#60a5fa"/></svg>
                        </div>
                        <h3>Industry Certifications</h3>
                        <p>Earn recognized certifications to boost your career.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon feature-icon-svg">
                            <!-- SVG: Community/Users -->
                            <svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="10" cy="14" r="4" fill="#2563eb"/><circle cx="22" cy="14" r="4" fill="#2563eb"/><ellipse cx="16" cy="22" rx="10" ry="4" fill="#60a5fa"/></svg>
                        </div>
                        <h3>Expert Community</h3>
                        <p>Connect with industry professionals and fellow learners.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Courses -->
    <section class="courses py-5" id="courses" style="background: #fff; color: #14213d;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="section-title mb-2" style="color:#14213d;">Featured Courses</h2>
                    <p class="section-subtitle" style="color:#4b5563;">Master the most in-demand cybersecurity skills</p>
                </div>
                <a href="{{ url('category/1') }}" class="btn btn-outline-cyber">View All Courses</a>
            </div>
            <div class="row g-4">
                @foreach ($randomCourses as $course)
                    <div class="col-md-4">
                        <div class="course-card" style="background:#fff; color:#14213d;">
                            <div class="course-image">
                                <img src="{{ asset('photos/courses/' . $course->course_thumbnail) }}"
                                    alt="{{ $course->course_title }}" class="img-fluid">
                                <div class="course-overlay">
                                    <a href="{{ url('courses/' . $course->course_id) }}" class="btn btn-cyber">View Course</a>
                                </div>
                            </div>
                            <div class="course-content">
                                <h3 class="course-title">
<<<<<<< HEAD
                                    <a href="{{ url('courses/' . $course->course_id) }}" style="color: #222;">
=======
                                    <a href="{{ url('/courses', ['course_id' => $course->course_id]) }}" style="color: #14213d;">
>>>>>>> 13e97da169f2a02a3397275199496a962c714447
                                        {{ Str::limit($course->course_title, 50) }}
                                    </a>
                                </h3>
                                <div class="course-meta" style="color:#4b5563;">
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
    <section class="testimonials py-5" style="background: #fff; color: #14213d;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" style="color:#14213d;">Success Stories</h2>
                <p class="section-subtitle" style="color:#4b5563;">What our learners say about CyberWise</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card" style="background:#fff; color:#000;">
                        <div class="testimonial-content">
                            <p>"CyberWise helped me transition from IT support to a cybersecurity analyst role."</p>
                        </div>
                        <div class="testimonial-author">
                            <span class="author-image-svg">
                                <!-- SVG Person Icon -->
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="25" cy="18" r="10" fill="#2563eb"/><ellipse cx="25" cy="38" rx="15" ry="10" fill="#60a5fa"/></svg>
                            </span>
                            <div class="author-info">
                                <h4>Arrach Imane
                                <p>Security Analyst at TechCorp</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card" style="background:#fff; color:#000;">
                        <div class="testimonial-content">
                            <p>"The quality of instruction and real-world scenarios prepared me for my current role as a penetration tester."</p>
                        </div>
                        <div class="testimonial-author">
                            <span class="author-image-svg">
                                <!-- SVG Person Icon -->
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="25" cy="18" r="10" fill="#2563eb"/><ellipse cx="25" cy="38" rx="15" ry="10" fill="#60a5fa"/></svg>
                            </span>
                            <div class="author-info">
                                <h4>Zabrati Hind
                                <p>Penetration Tester at SecureNet</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card" style="background:#fff; color:#000;">
                        <div class="testimonial-content">
                            <p>"The structured learning paths and expert support helped me earn my CISSP certification in just 6 months."</p>
                        </div>
                        <div class="testimonial-author">
                            <span class="author-image-svg">
                                <!-- SVG Person Icon -->
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="25" cy="18" r="10" fill="#2563eb"/><ellipse cx="25" cy="38" rx="15" ry="10" fill="#60a5fa"/></svg>
                            </span>
                            <div class="author-info">
                                <h4>Himane Zarrach
                                <p>Security Consultant at CyberDefense</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta py-5" style="background: linear-gradient(rgba(20,33,61,0.97), rgba(20,33,61,0.97)), url('{{ asset('photos/cta-bg.jpg') }}'); background-size: cover; background-position: center; color: #fff;">
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
            background: #10172b;
            color: #e0e6ed;
            font-family: 'Poppins', Arial, sans-serif;
        }
        /* Hero Section */
        .hero {
            color: #fff;
            padding: 120px 0 80px 0;
            position: relative;
            overflow: hidden;
            background: url('{{ asset('photos/hero-bg.jpg') }}') no-repeat center center;
            background-size: cover;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(20, 33, 61, 0.85);
            z-index: 1;
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
            color: #60a5fa;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 500;
        }
        .hero h1 {
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .hero .lead {
            font-size: 1.25rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            color: #fff;
            text-shadow: 0 0 12px #fff, 0 0 24px #fff, 0 2px 8px #60a5fa;
            font-weight: 500;
            letter-spacing: 0.01em;
        }
        .hero-buttons .btn-cyber {
            background: #1a8cff;
            color: #fff;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(26,140,255,0.15);
        }
        .hero-buttons .btn-cyber:hover {
            background: #2563eb;
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
            color: #1a8cff;
            margin-bottom: 0.5rem;
        }
        .stat-item p {
            color: #b3c2e0;
            margin: 0;
        }

        /* Features Section */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 1rem;
        }
        .section-subtitle {
            color: #b3c2e0;
            font-size: 1.1rem;
        }
        .feature-card {
            background: #1a2238;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            background: #1a8cff;
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
            color: #fff;
        }
        .feature-card p {
            color: #b3c2e0;
            margin: 0;
        }

        /* Course Cards */
        .course-card {
            background: #222b45;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
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
            background: rgba(26,140,255, 0.92);
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
            color: #fff;
            text-decoration: none;
        }
        .course-meta {
            display: flex;
            gap: 1rem;
            color: #b3c2e0;
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
            color: #1a8cff;
        }
        .price-old {
            color: #b3c2e0;
            text-decoration: line-through;
        }
        .price-free {
            font-size: 1.25rem;
            font-weight: 600;
            color: #10b981;
        }

        /* Testimonials */
        .testimonial-card {
            background: #fff !important;
            color: #000 !important;
            box-shadow: 0 2px 12px 0 rgba(60,60,60,0.08), 0 0 0 1px #e5e7eb;
            border: 1px solid #e5e7eb;
            padding: 2rem;
        }
        .testimonial-card .testimonial-content p,
        .testimonial-card .author-info h4,
        .testimonial-card .author-info p {
            color: #000 !important;
        }
        .testimonial-content {
            margin-bottom: 1.5rem;
        }
        .testimonial-content p {
            color: #fff;
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
            color: #fff;
        }
        .author-info p {
            color: #b3c2e0;
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
            background: #1a8cff;
            color: #fff;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(26,140,255,0.15);
        }
        .btn-cyber:hover, .btn-outline-cyber:hover {
            background: #2563eb;
            color: #fff;
            transform: translateY(-2px);
        }
        .btn-outline-cyber {
            background: transparent;
            color: #1a8cff;
            border: 2px solid #1a8cff;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-outline-cyber:focus, .btn-cyber:focus {
            outline: none;
            box-shadow: 0 0 0 2px #1a8cff44;
        }
    </style>
@endsection
