
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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

                        <form name="pms_login" id="pms_login" method="POST"   action="{{ route('password.store') }}">
                            @csrf
                            <h4>Reset Password</h4>
                            </p>

                            <p class="login-username">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="input" :value="old('password')" size="20" >
                                <br>
                                <font size="1px"><span id="passwordMsg" style="color:red"> </span></font>
                            </p>

                            <p class="login-username">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="input" :value="old('password_confirmation')" size="20" autocomplete="password_confirmation">
                                <br>
                                <font size="1px"><span id="password_confirmationMsg" style="color:red"> </span></font>
                            </p>

                            <p class="login-submit"  >
                                <input type="button" onclick="return validateForm()" class="button button-primary mt-4" value="Email Password Reset Link">
                                <input type="hidden" >
                            </p>

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


<script>

    function validateForm() {

        var pass                    = document.getElementById("password").value;
        var password_confirmation   = document.getElementById("password_confirmation").value;

        var regex_number = /^(?:\+44|0)(?:\d{10}|\d{9}|\d{7}|\d{6}|\d{5})$/;

        let regex =
            /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&])[A-Za-z\d@.#$!^%*?&]{8,15}$/;

        if (pass == "") {

            document.getElementById("passwordMsg").innerHTML    = "Please enter the Password";

            return false;

        }
        else if ((pass != "") && !(regex.test(pass)) ) {

            document.getElementById("passwordMsg").innerHTML    = "Password must include a small letter, capital letter, special character and a digit";

            return false;

        }
        else if (password_confirmation == "") {

            document.getElementById("password_confirmationMsg").innerHTML   = "Please Enter the confirm Password";
            document.getElementById("passwordMsg").innerHTML                = "";

            return false;

        }
        else if (pass != password_confirmation) {

            document.getElementById("password_confirmationMsg").innerHTML   = "Password Mismatch";

            return false;
        }
        else {
            document.getElementById("pms_login").submit();
        }
    }
</script>
