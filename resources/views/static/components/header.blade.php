<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CyberWise</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ url('assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ url('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        :root {
            --primary-color: #1e40af;
            --primary-hover: #1e3a8a;
            --accent-color: #3b82f6;
            --text-color: #1e3a8a;
            --text-light: #64748b;
            --bg-color: #ffffff;
            --border-color: #e2e8f0;
            --gradient-start: #1e40af;
            --gradient-end: #3b82f6;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--text-color);
            background-color: #f8fafc;
        }

        .mainheader-area {
            background: var(--bg-color);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.98);
        }

        .logo a {
            font-size: 36px;
            font-weight: 800;
            color: var(--primary-color);
            text-decoration: none;
            letter-spacing: -1px;
            position: relative;
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .logo a:hover {
            background: rgba(30, 64, 175, 0.05);
            transform: translateY(-2px);
        }

        .logo a span {
            color: var(--accent-color);
        }

        .horizontal-menu {
            background: transparent;
        }

        .horizontal-menu ul li a {
            color: var(--text-color);
            font-weight: 500;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .horizontal-menu ul li a:hover {
            color: var(--primary-color);
            background: rgba(30, 64, 175, 0.05);
            transform: translateY(-2px);
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 0.75rem 1rem;
            padding-right: 2.5rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #f8fafc;
        }

        .search-box input:focus {
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.1);
            outline: none;
        }

        .search-box button {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            transition: all 0.3s ease;
            background: transparent;
            border: none;
            padding: 8px;
            border-radius: 50%;
        }

        .search-box button:hover {
            color: var(--primary-color);
            background: rgba(30, 64, 175, 0.1);
        }

        .notification-area {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .notification-area li {
            position: relative;
        }

        .notification-area li i {
            font-size: 1.25rem;
            color: var(--text-light);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0.5rem;
            border-radius: 12px;
        }

        .notification-area li i:hover {
            color: var(--primary-color);
            background: rgba(30, 64, 175, 0.1);
        }

        .notification-area li span {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--primary-color);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-weight: 600;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: transparent;
        }

        .user-profile:hover {
            background: rgba(30, 64, 175, 0.05);
        }

        .user-profile .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .user-profile:hover .avatar {
            border-color: var(--primary-color);
        }

        .user-profile .user-name {
            color: var(--text-color);
            font-weight: 600;
            font-size: 0.95rem;
            margin: 0;
        }

        .login-button {
            background: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .login-button:hover {
            background: var(--primary-hover);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(30, 64, 175, 0.2);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 0.75rem;
            min-width: 220px;
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            color: var(--text-color);
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: rgba(30, 64, 175, 0.05);
            color: var(--primary-color);
        }

        @media (max-width: 991px) {
            .horizontal-menu {
                background: var(--bg-color);
                padding: 1rem;
                border-radius: 12px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            }

            .mainheader-area {
                padding: 0.5rem 0;
            }

            .search-box {
                margin: 1rem 0;
            }

            .login-button {
                width: 100%;
                justify-content: center;
                margin-top: 1rem;
            }
        }
    </style>
</head>

<body class="body-bg">

    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area">
            <div class="container">
                <div class="row justify-content-center p-3">
                    <div class="col-auto">
                        <div class="logo">
                            <a href="{{ url('/') }}">Cyber<span>Wise</span></a>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-9 clearfix text-right">
                        <div class="d-md-inline-block d-block mr-md-4">
                            <ul class="notification-area">
                                <li id="full-view"><i class="ti-fullscreen"></i></li>
                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                                <li class="dropdown">
                                    <i class="fa fa-envelope-o dropdown-toggle"
                                        data-toggle="dropdown"><span>3</span></i>
                                    <div class="dropdown-menu notify-box nt-enveloper-box">
                                        <span class="notify-title">You have 3 new notifications <a href="#">view
                                                all</a></span>
                                        <div class="nofity-list">
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="{{ url('assets/images/author/author-img1.jpg') }}"
                                                        alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Hey I am waiting for you...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="settings-btn">
                                    <i class="ti-settings"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0">
                                @auth
                                    <img class="avatar user-thumb"
                                        src="{{ Auth::user()->user_photo ? asset('upload/' . basename(Auth::user()->user_photo)) : 'https://img.icons8.com/bubbles/100/000000/user.png' }}"
                                        alt="avatar">
                                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                                        {{ Auth::user()->full_name }}
                                        <i class="fa fa-angle-down"></i>
                                    </h4>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('profile.show', ['id' => auth()->id()]) }}">Profile</a>
                                        <a class="dropdown-item" href="#">Settings</a>
                                        <a class="dropdown-item" href="{{ url('logout') }}">Log Out</a>
                                    </div>
                                @else
                                    <a href="{{ url('login') }}" class="login-button">
                                        <i class="ti-shift-right"></i>
                                        Log in
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <li>
                                        <a href="{{ url('') }}">
                                            <div class="icon-container">
                                                <span class="ti-home"></span><span class="icon-name">Home</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <div class="icon-container">
                                                <span class="ti-briefcase"></span><span
                                                    class="icon-name">Categories</span>
                                            </div>
                                        </a>
                                        <ul class="submenu">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a
                                                        href="{{ url('category', ['id' => $category->category_id]) }}">{{ $category->category_title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @if (auth()->check())
                                        @if (auth()->user()->role == 'teacher')
                                            <li>
                                                <a href="{{ url('/teacher/dashboard') }}">
                                                    <div class="icon-container">
                                                        <span class="ti-dashboard"></span><span
                                                            class="icon-name">Teacher Dashboard</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @else
                                        <li>
                                            <a href="{{ url('login') }}">
                                                <div class="icon-container">
                                                    <span class="ti-shift-right"></span><span
                                                        class="icon-name">Log-In</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/teacher-login') }}">
                                                <div class="icon-container">
                                                    <span class="ti-id-badge"></span><span class="icon-name">Become To
                                                        Teach</span>
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- nav and search button -->
                    <div class="col-lg-3 clearfix">
                        <div class="search-box">
                            <form action="{{ route('search_courses') }}" method="GET" class="d-flex">
                                <input type="text" name="search" value="{{ Request::get('search') }}"
                                    placeholder="Search For Anything ..." class="form-control" required>
                                <button type="submit" class="btn btn-link p-0 ml-2">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
        @include('_message')

        @yield('content')

        @include('static.components.footer')
    </div>
    <!-- main wrapper start -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="{{ url('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="{{ url('assets/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ url('assets/js/pie-chart.js') }}"></script>
    <!-- all bar chart -->
    <script src="{{ url('assets/js/bar-chart.js') }}"></script>
    <!-- all map chart -->
    <script src="{{ url('assets/js/maps.js') }}"></script>
    <!-- others plugins -->
    <!-- others plugins -->
    <script src="{{ url('assets/js/plugins.js') }}"></script>
    <script src="{{ url('assets/js/scripts.js') }}"></script>
