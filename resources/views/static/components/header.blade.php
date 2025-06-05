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
            --primary-color: #2563eb;
            --primary-hover: #1746a0;
            --accent-color: #10b981;
            --text-color: #222;
            --text-light: #6b7280;
            --bg-color: #fff;
            --border-color: #e5e7eb;
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
            font-family: 'Poppins', Arial, sans-serif;
            color: var(--text-color);
            background-color: #f8f9fa;
        }

        .mainheader-area {
            background: var(--bg-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.98);
            padding: 0.5rem 0;
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
            background: rgba(37, 99, 235, 0.05);
            transform: translateY(-2px);
        }

        .logo a span {
            color: var(--accent-color);
        }

        .search-box {
            position: relative;
            max-width: 200px;
            margin: 0;
        }

        .search-box input {
            width: 100%;
            padding: 0.4rem 1rem;
            padding-right: 2.5rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.85rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #f8fafc;
        }

        .search-box button {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            transition: all 0.3s ease;
            background: transparent;
            border: none;
            padding: 4px;
            border-radius: 50%;
            font-size: 0.85rem;
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
            background: rgba(37, 99, 235, 0.05);
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
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 1rem;
            min-width: 280px;
            max-height: 400px;
            overflow-y: auto;
            background: #fff;
            color: var(--text-color);
        }

        .dropdown-item {
            padding: 1rem;
            color: var(--text-color);
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            line-height: 1.5;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 0.5rem;
            background: transparent;
        }

        .dropdown-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .dropdown-item:hover {
            background: rgba(37, 99, 235, 0.05);
            color: var(--primary-color);
        }

        .dropdown-item .time {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-top: 0.5rem;
            display: block;
        }

        .dropdown-item .message {
            color: var(--text-color);
            font-weight: 500;
            margin-bottom: 0.25rem;
            display: block;
        }

        .dropdown-item.unread {
            background: rgba(37, 99, 235, 0.05);
        }

        .dropdown-item.unread:hover {
            background: rgba(37, 99, 235, 0.08);
        }

        .dropdown-item.unread .message {
            color: var(--primary-color);
            font-weight: 600;
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

        .notification-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            width: 280px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 0.75rem;
            display: none;
            z-index: 1000;
            max-height: 320px;
            overflow-y: auto;
            color: var(--text-color);
        }

        .notification-item {
            padding: 0.75rem;
            border-bottom: 1px solid var(--border-color);
            transition: all 0.2s ease;
            font-size: 0.9rem;
            color: var(--text-color);
            line-height: 1.4;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item:hover {
            background: rgba(30, 64, 175, 0.03);
        }

        .notification-item.unread {
            background: rgba(30, 64, 175, 0.05);
        }

        .notification-item.unread:hover {
            background: rgba(30, 64, 175, 0.08);
        }

        .notification-item .time {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-top: 0.25rem;
        }

        .notification-item .message {
            color: var(--text-color);
            font-weight: 400;
        }

        .header-bottom {
            background: var(--bg-color);
            border-top: 1px solid var(--border-color);
            padding: 0.5rem 0;
        }

        .horizontal-menu {
            background: transparent;
        }

        .horizontal-menu ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            justify-content: flex-end;
        }

        .horizontal-menu ul li {
            position: relative;
            margin-left: 0.5rem;
        }

        .horizontal-menu ul li a {
            color: var(--text-color);
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .horizontal-menu ul li a:hover {
            color: var(--primary-color);
            background: rgba(30, 64, 175, 0.05);
        }

        .horizontal-menu .icon-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .horizontal-menu .icon-name {
            font-size: 0.9rem;
        }

        .horizontal-menu .submenu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
            min-width: 200px;
            display: none;
            z-index: 1000;
        }

        .horizontal-menu li:hover .submenu {
            display: block;
        }

        .horizontal-menu .submenu li {
            margin: 0;
        }

        .horizontal-menu .submenu li a {
            padding: 0.5rem 1rem;
            display: block;
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .horizontal-menu .submenu li a:hover {
            background: rgba(30, 64, 175, 0.05);
            color: var(--primary-color);
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
                <div class="row align-items-center p-3">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="{{ url('/') }}">Cyber<span>Wise</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="search-box">
                            <input type="text" placeholder="Rechercher..." class="form-control">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu" class="d-flex justify-content-end">
                                    <li>
                                        <a href="{{ url('') }}">
                                            <div class="icon-container">
                                                <span class="ti-home"></span><span class="icon-name">Home</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('category/1') }}">
                                            <div class="icon-container">
                                                <span class="ti-book"></span><span class="icon-name">Courses</span>
                                            </div>
                                        </a>
                                    </li>
                                    @auth
                                        @if (auth()->user()->role == 'teacher')
                                            <li>
                                                <a href="{{ url('/teacher/dashboard') }}">
                                                    <div class="icon-container">
                                                        <span class="ti-dashboard"></span><span class="icon-name">Teacher Dashboard</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @elseif (auth()->user()->role == 'learner')
                                            <li>
                                                <a href="{{ url('/learner/dashboard') }}">
                                                    <div class="icon-container">
                                                        <span class="ti-dashboard"></span><span class="icon-name">My Dashboard</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @else
                                        <li>
                                            <a href="{{ url('login') }}">
                                                <div class="icon-container">
                                                    <span class="ti-shift-right"></span><span class="icon-name">Log-In</span>
                                                </div>
                                            </a>
                                        </li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
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
