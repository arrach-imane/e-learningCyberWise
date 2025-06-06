<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-content">
                    <div class="footer-logo">
                        <a href="{{ url('/') }}" class="text-2xl font-bold">Cyber<span>Wise</span></a>
                    </div>
                    <div class="footer-links">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ url('/courses') }}">Courses</a>
                        <a href="{{ url('/about') }}">About Us</a>
                        <a href="{{ url('/contact') }}">Contact</a>
                    </div>
                    <div class="footer-social">
                        <a href="#" class="social-link"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="social-link"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fa fa-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="fa fa-instagram"></i></a>
                    </div>
                    <div class="footer-copyright">
                        <p>© {{ date('Y') }} CyberWise. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .footer-area {
            background: #fff;
            padding: 3rem 0;
            margin-top: 4rem;
            border-top: 1px solid #e5e7eb;
        }

        .footer-content {
            text-align: center;
        }

        .footer-logo {
            margin-bottom: 1.5rem;
        }

        .footer-logo a {
            font-size: 28px;
            font-weight: 800;
            color: #2563eb;
            text-decoration: none;
            letter-spacing: -1px;
        }

        .footer-logo a span {
            color: #10b981;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #222;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem;
        }

        .footer-links a:hover {
            color: #2563eb;
            transform: translateY(-2px);
        }

        .footer-social {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .social-link {
            color: #6b7280;
            font-size: 1.25rem;
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: transparent;
        }

        .social-link:hover {
            color: #2563eb;
            background: rgba(37, 99, 235, 0.05);
            transform: translateY(-2px);
        }

        .footer-copyright {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .footer-copyright p {
            margin: 0;
        }

        @media (max-width: 768px) {
            .footer-area {
                padding: 2rem 0;
                margin-top: 2rem;
            }

            .footer-links {
                gap: 1rem;
            }

            .footer-links a {
                font-size: 0.9rem;
            }

            .social-link {
                width: 35px;
                height: 35px;
                font-size: 1.1rem;
            }
        }
    </style>
</footer>
