<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Top 1 E-learning In Cambodia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/assets/images/icon/favicon.ico">

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <link rel="stylesheet" href="/assets/css/typography.css">
    <link rel="stylesheet" href="/assets/css/default-css.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">

    <!-- Modernizr -->
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>

    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header p-3 bg-dark d-flex justify-content-center align-items-center">
                <div class="logo d-flex align-items-center">
                    <a href="{{ url('admin/dashboard') }}" class="d-flex align-items-center text-decoration-none">
                        <img src="/assets/images/icon/logo007_64.ico" alt="Website Logo" class="img-fluid mr-2"
                            style="width: 64px; height: 64px;">
                    </a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="{{ url('admin/dashboard') }}">
                                    <img class="img-fluid px-2" style="width: 50px;" src="/assets/Icons/Home.png"
                                        alt="Home">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/users') }}">
                                    <img class="img-fluid px-2" style="width: 50px;" src="/assets/Icons/User.png"
                                        alt="Users">
                                    <span>Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/category') }}">
                                    <img class="img-fluid px-2" style="width: 50px;" src="/assets/Icons/Category.png"
                                        alt="Category">
                                    <span>Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/courses') }}">
                                    <img class="img-fluid px-2" style="width: 50px;" src="/assets/Icons/Courses.png"
                                        alt="Courses">
                                    <span>Courses</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/lessons') }}">
                                    <img class="img-fluid px-2" style="width: 50px;" src="/assets/Icons/Lessons.png"
                                        alt="Lessons">
                                    <span>Lessons</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
        <div class="page-title-area">
            <div class="nav-btn pull-left" style="margin: 22px 0px 0px 0">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Dashboard</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="index.html">Home</a></li>
                            <li><span>Dashboard</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">

                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin<i
                                class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Message</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="{{ url('logout') }}">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('_message')

        @yield('content')

        @include('admin.layout.footer')
        @include('admin.script.script_table')
        @include('admin.style.style')


    </div>

    <!-- jQuery -->
    <script src="/assets/js/vendor/jquery-2.2.4.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    <!-- Owl Carousel -->
    <script src="/assets/js/owl.carousel.min.js"></script>

    <!-- MetisMenu -->
    <script src="/assets/js/metisMenu.min.js"></script>

    <!-- Slimscroll -->
    <script src="/assets/js/jquery.slimscroll.min.js"></script>

    <!-- Slicknav -->
    <script src="/assets/js/jquery.slicknav.min.js"></script>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <!-- Optional: JSZip for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <!-- Optional: pdfmake for PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <!-- Amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <!-- Custom Charts -->
    <script src="/assets/js/line-chart.js"></script>
    <script src="/assets/js/pie-chart.js"></script>
    <script src="/assets/js/bar-chart.js"></script>
    <script src="/assets/js/maps.js"></script>

    <!-- Other Plugins -->
    <script src="/assets/js/plugins.js"></script>

    <!-- Custom Scripts -->
    <script src="/assets/js/scripts.js"></script>

</body>

</html>
