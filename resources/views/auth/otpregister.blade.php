
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

    <!-- register -->
    <section class="position-relative pb-0">
        <div class="gen-register-page-background" style="background-image: url('images/background/asset-3.jpg');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form method="POST" id="pms_register-form" class="pms-form"
                            action="{{ route('storeotpregister') }}">
                            @csrf
                            <h4>Otp</h4>

                            <input type="hidden" id="user_type" name="user_type" value="{{ $user_type }}">
                            <input type="hidden" id="name" name="name" value="{{ $name }}">
                            <input type="hidden" id="sur_name" name="sur_name" value="{{ $sur_name }}">
                            <input type="hidden" id="email" name="email" value="{{ $email }}">
                            <input type="hidden" id="password" name="password" value="{{ $password }}">
                            <input type="hidden" id="password_confirmation" name="password_confirmation" value="{{ $password_confirmation }}">
                            <input type="hidden" id="user_plan_type" name="user_plan_type" value="{{ $user_plan_type }}">
                            <input type="hidden" id="phone" name="phone" value="{{ $phone }}">

                            <div class="pms-field pms-user-login-field" style="width:48%" id="code">
                                <label for="new otp"> Enter The Otp Send To Your Email *</label>
                                <input id="code" name="code" type="text"
                                     autofocus autocomplete="code">

                                <x-input-error :messages="$errors->get('code')" class="mt-2"
                                    style="color:red; list-style-type: none;" />
                            </div>

                            <br>

                            <div class="pms-field pms-user-login-field" style="width:48%" id="otp">
                                {{-- <label for="otp">Otp *</label> --}}
                                <input id="otp"  type="hidden" name="otp" value="{{ $otp }}"
                                     autofocus autocomplete="otp">
                                <x-input-error :messages="$errors->get('otp')" class="mt-2"
                                    style="color:red; list-style-type: none;" />
                            </div>

                            <br><br>

                            <input name="pms_register" type="submit" value="Ok"
                                style="margin-right:20px !important;">
                            <div class="flex items-center justify-end mt-4">

                                <a href="{{ route('otpregister') }}">Resend Otp</a>

                                {{-- <input type="hidden" name="pms_login" value="1">
                                <input type="button" name="pms_redirect" onclick="ResendOtp();" > --}}

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- register -->


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

function ResendOtp() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    alert("hii");
    $.ajax({

        type: 'POST',
        contentType: false,
        processData: false,
        cache: false,
        url: "{{ route('register.store') }}",
        data: formData,
        success: function(data) {

        $('.alert-success').html(data.success).fadeIn('slow');
        $('.alert-success').delay(3000).fadeOut('slow');
        window.location.reload();
        }
    });
}

</script>
