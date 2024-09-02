
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sellitoff</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>

    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/logo-1.png" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->
    @include('frontend.templates.toastr-notifications')

    <!-- Log-in  -->
    <section class="position-relative pb-0">
        <div class="gen-login-page-background" style="background-image: url('images/background/assett-54.jpg');"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form name="pms_login" id="pms_login" method="POST"   action="{{ route('login') }}">
                            @csrf
                            <h4>Sign In </h4>
                            <p class="login-username">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" class="input" :value="old('email')" size="20" autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </p>

                            <p class="login-password">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="input" value="" size="20"  required autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </p>


                            <p class="login-submit">
                                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary"
                                    value="Log In">
                                <input type="hidden" name="redirect_to">
                            </p>

                            <input type="hidden" name="pms_login" value="1"><input type="hidden" name="pms_redirect"><a
                                href="{{ route('register') }}">Create new account</a>
                                <input type="hidden" name="pms_login" value="1"><input type="hidden" name="pms_redirect"><a
                                href="{{ route('register') }}">Register</a> | <a href="{{ route('password.forgot') }}">Lost your
                                password?</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Log-in  -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

    <!-- js-min -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/asyncloader.min.js"></script>
    <!-- JS bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl-carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- counter-js -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- popper-js -->
    <script src="js/popper.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <!-- Iscotop -->
    <script src="js/isotope.pkgd.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/slick.min.js"></script>

    <script src="js/streamlab-core.js"></script>

    <script src="js/script.js"></script>


</body>
</html>
