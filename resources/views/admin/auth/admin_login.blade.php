<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="/assets/css/typography.css">
    <link rel="stylesheet" href="/assets/css/default-css.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box p-5">
                @include('_message')
                <form action="{{ route('admin.login') }}" method="post" class="mt-5">
                    @csrf
                    <div class="login-form-head">
                        <h4>Admin Sign In</h4>
                        <p>Hello! Admin</p>
                    </div>
                    <div class="login-form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-gp">
                                    <label for="email">Email address</label>
                                    <input type="email" id="email" name="email" required>
                                    <i class="ti-email" aria-hidden="true"></i>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-gp">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" required>
                                    <i class="ti-lock" aria-hidden="true"></i>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="submit-btn-area">
                                    <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="text-center mt-0">
                <img src="{{ url('assets/images/bg/whoareyou.gif') }}" alt="Who are you?"
                    class="img-fluid mx-auto d-block" style="width: 50%;">
                <audio id="myAudio" src="assets/images/bg/Who_are_you_Sound_effect.mp3" preload="auto"></audio>
            </div>
        </div>
    </div>

    <script src="/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/metisMenu.min.js"></script>
    <script src="/assets/js/jquery.slimscroll.min.js"></script>
    <script src="/assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/scripts.js"></script>
    <script>
        window.addEventListener('load', (event) => {
            var audioElement = document.getElementById('myAudio');
            audioElement.loop = true; 
            audioElement.play();
        });
    </script>
</body>
