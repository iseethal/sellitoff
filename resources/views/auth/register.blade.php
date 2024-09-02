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

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <!-- register -->
    <section class="position-relative pb-0">
        <div class="gen-register-page-background" style="background-image: url('images/background/asset-3.jpg');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form method="POST" id="pms_register-form" class="pms-form"
                            action="{{ route('register.store') }}">
                            @csrf
                            <h4>Register</h4>
                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>

                            <li class="pms-field pms-field-subscriptions " style="display: inline-block !important;">
                                <div class="pms-subscription-plan"><label>

                                        <input type="radio" style="display: inline-block;" name="user_type"
                                            id="user_type" onclick=show_plan(); data-price="199" data-duration="1"
                                            value="1" checked="checked" data-default-selected="true"><span
                                            class="pms-subscription-plan-name ">Seller</span> &nbsp;&nbsp;&nbsp;

                                        <input type="radio" style="display: inline-block;" name="user_type"
                                            id="user_types" onclick=hide_plan(); value="2">
                                        <span class="pms-subscription-plan-name ">Buyer</span>
                                        <span>

                                            <x-input-error :messages="$errors->get('user_type')" class="mt-2"
                                                style="color:red; list-style-type: none;" />
                            </li>

                            <input type="hidden" id="pmstkn" name="pmstkn" value="59b502f483"><input type="hidden"
                                name="_wp_http_referer" value="/register/">

                            <ul class="pms-form-fields-wrapper pl-0">

                                <li class="pms-field pms-user-login-field ">
                                    <label for="name">First Name</label>
                                    <input id="name" name="name" type="text" :value="old('name')" autofocus
                                        autocomplete="name">
                                    <font size="1px"><span id="nameMsg" style="color:red"> </span></font>

                                </li>
                                <li class="pms-field pms-user-login-field ">
                                    <label for="sur_name">Last Name</label>
                                    <input id="sur_name" name="sur_name" type="text" :value="old('sur_name')"
                                        autofocus autocomplete="sur_name">
                                    <font size="1px"><span id="sur_nameMsg" style="color:red"> </span></font>

                                </li>
                                <li class="pms-field pms-user-email-field ">
                                    <label for="email">E-mail Id</label>
                                    <input id="email" name="email" type="text" required>
                                    <font size="1px"><span id="emailMsg" style="color:red"> </span></font>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </li>
                                <li id="div_phone" class="pms-field pms-user-email-field ">
                                    <label for="email">Phone</label>
                                    <input id="phone" name="phone" type="text" value="" required>
                                    <font size="1px"><span id="phoneMsg" style="color:red"> </span></font>

                                </li>

                                <li class="pms-field pms-pass1-field">
                                    <label for="password">Password </label>
                                    <input id="password" name="password" type="password" required><br>
                                    <font size="1px"><span id="passwordMsg" style="color:red"> </span></font>
                                </li>
                                <li class="pms-field pms-pass2-field">
                                    <label for="password_confirmation">Confirm Password </label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        required><br>
                                    <font size="1px"><span id="password_confirmationMsg" style="color:red">
                                        </span></font>
                                </li>

                                <li class="pms-field pms-field-subscriptions ">

                                    <span id="span_hide">
                                        <div class="pms-subscription-plan"><label><input type="radio"
                                                    name="user_plan_type" value="1" checked="checked"
                                                    data-default-selected="true"><span
                                                    class="pms-subscription-plan-name">Individual</span></div>
                                        <div class="pms-subscription-plan"><label><input type="radio"
                                                    name="user_plan_type" value="2"
                                                    data-default-checked="false"><span
                                                    class="pms-subscription-plan-name">Business</span><span
                                                    class="pms-subscription-plan-price"><span class="pms-divider">
                                                    </span></div>
                                    </span>

                                </li>

                            </ul>
                            <br><br>

                            <input name="pms_register" type="button" value="Register"
                                onclick="return validateForm()" style="margin-right:20px !important;">


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- register -->


    <script>
        function validateForm() {

            // var name                    = document.getElementById("name").value;
            // var sur_name                = document.getElementById("sur_name").value;
            // var email                   = document.getElementById("email").value;
            // var pass                    = document.getElementById("password").value;
            // var password_confirmation   = document.getElementById("password_confirmation").value;
            // var phone                   = document.getElementById("phone").value;

            // var regex_number = /^(?:\+44|0)(?:\d{10}|\d{9}|\d{7}|\d{6}|\d{5})$/;

            // let regex =
            //     /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&])[A-Za-z\d@.#$!^%*?&]{8,15}$/;


            // if (name == "") {
            //     document.getElementById("nameMsg").innerHTML        = "Please enter the first name";
            //     return false;
            // }
            // else if (sur_name == "") {

            //     document.getElementById("sur_nameMsg").innerHTML    = "Please enter the last name";
            //     document.getElementById("nameMsg").innerHTML        = "";

            //     return false;
            // }
            // else if (email == "") {

            //     document.getElementById("emailMsg").innerHTML       = "Please enter the email";
            //     document.getElementById("sur_nameMsg").innerHTML    = "";
            //     document.getElementById("nameMsg").innerHTML        = "";

            //     return false;
            // }
            // else if (phone == "") {

            //     document.getElementById("phoneMsg").innerHTML       = "Please enter the phone";
            //     document.getElementById("emailMsg").innerHTML       = "";
            //     document.getElementById("sur_nameMsg").innerHTML    = "";
            //     document.getElementById("nameMsg").innerHTML        = "";
            //     return false;
            // }
            // else if (!regex_number.test(phone)) {

            //     document.getElementById("phoneMsg").innerHTML       = "Please enter a valid UK phone number.";
            //     document.getElementById("emailMsg").innerHTML       = "";
            //     document.getElementById("sur_nameMsg").innerHTML    = "";
            //     document.getElementById("nameMsg").innerHTML        = "";
            //     return false;
            // }
            // else if (pass == "") {

            //     document.getElementById("passwordMsg").innerHTML    = "Please enter the Password";
            //     document.getElementById("phoneMsg").innerHTML       = "";
            //     document.getElementById("emailMsg").innerHTML       = "";
            //     document.getElementById("sur_nameMsg").innerHTML    = "";
            //     document.getElementById("nameMsg").innerHTML        = "";
            //     return false;

            // }
            // else if ((pass != "") && !(regex.test(pass)) ) {

            //     document.getElementById("passwordMsg").innerHTML    = "Password must include a small letter, capital letter, special character and a digit";
            //     document.getElementById("phoneMsg").innerHTML       = "";
            //     document.getElementById("emailMsg").innerHTML       = "";
            //     document.getElementById("sur_nameMsg").innerHTML    = "";
            //     document.getElementById("nameMsg").innerHTML        = "";
            //     return false;

            // }
            // else if (password_confirmation == "") {

            //     document.getElementById("password_confirmationMsg").innerHTML   = "Please Enter the confirm Password";
            //     document.getElementById("passwordMsg").innerHTML                = "";
            //     document.getElementById("phoneMsg").innerHTML                   = "";
            //     document.getElementById("emailMsg").innerHTML                   = "";
            //     document.getElementById("sur_nameMsg").innerHTML                = "";
            //     document.getElementById("nameMsg").innerHTML                    = "";
            //     return false;

            // }
            // else if (pass != password_confirmation) {

            //     document.getElementById("password_confirmationMsg").innerHTML   = "Password Mismatch";
            //     document.getElementById("phoneMsg").innerHTML                   = "";
            //     document.getElementById("emailMsg").innerHTML                   = "";
            //     document.getElementById("sur_nameMsg").innerHTML                = "";
            //     document.getElementById("nameMsg").innerHTML                    = "";
            //     return false;
            // }
            // else {
            document.getElementById("pms_register-form").submit();
            // }
        }
    </script>

    <script>
        function show_plan() {
            document.getElementById("span_hide").style.display = '';
        }

        function hide_plan() {
            document.getElementById("span_hide").style.display = 'none';
        }
    </script>

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
