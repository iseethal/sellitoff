<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from template.gentechtreedesign.com/html/streamlab/red-html/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jul 2023 12:59:58 GMT -->

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

    <style>
        .widget.widget_recent_comments ul li:before,
        .widget.widget_recent_comments ul li:before {

            content: '' !important;
        }
    </style>
</head>

<body>

    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/logo-1.png" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!--========== Header ==============-->

    @include('frontend.templates.header')

    <!--========== Header ==============-->

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                User Profile
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">user profile  Sss</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->


    <!-- blog single -->
    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="gen-blog-post">
                        <div class="gen-post-media">
                        </div>
                        <div class="gen-blog-contain">
                            <div class="gen-post-meta">
                            </div>
                            <div class="row mb-4" >
                                <div class="col-xl-6 col-md-6">
                                    <div class="gen-img-main">
                                        <div class="row" >

                                            <div class="col-8" >
                                                <form method="POST" id="pms_register-form" class="pms-form"
                                                   style="width: 1034px;" action="{{ route('frontend.profile.profileupdate') }}">
                                                    @csrf
                                                    <h4>Profile</h4>

                                                    <li class="pms-field pms-field-subscriptions "
                                                        style="display: inline-block !important;">
                                                        <div class="pms-subscription-plan"><label>

                                                                @php
                                                                    $checked = 'checked';
                                                                @endphp

                                                                <input type="radio" style="display: inline-block;"
                                                                    name="user_type" data-price="199" data-duration="1"
                                                                    value="{{ $user->user_type }}"
                                                                    @if ($user->user_type == 1) ? checked =  $checked :'' @endif><span
                                                                    class="pms-subscription-plan-name ">Seller</span>
                                                                &nbsp;&nbsp;&nbsp;

                                                                <input type="radio" style="display: inline-block;"
                                                                    name="user_type" value="{{ $user->user_type }}"
                                                                    @if ($user->user_type == 2) ? checked =  $checked :'' @endif>
                                                                <span class="pms-subscription-plan-name ">Buyer</span>
                                                                <span>

                                                                    <x-input-error :messages="$errors->get('user_type')" class="mt-2"
                                                                        style="color:red; list-style-type: none;" />
                                                            </label></div>
                                                        <div class="pms-subscription-plan"><label>

                                                            </label></div>
                                                    </li>
                                                    <br>
                                                    <input type="hidden" id="pmstkn" name="pmstkn"
                                                        value="59b502f483"><input type="hidden" name="_wp_http_referer"
                                                        value="/register/">
                                                    <ul class="pms-form-fields-wrapper pl-0">

                                                        <li class="pms-field pms-user-login-field ">
                                                            <label for="name">Name *</label>
                                                            <input id="name" name="name" type="text"
                                                                value="{{ $user->name }}" required autofocus
                                                                autocomplete="name">
                                                            <x-input-error :messages="$errors->get('name')" class="mt-2"
                                                                style="color:red; list-style-type: none;" />
                                                        </li>

                                                        <li class="pms-field pms-user-email-field ">
                                                            <label for="email">E-mail *</label>
                                                            <input id="email" name="email" type="text"
                                                                value="{{ $user->email }}" required>
                                                            <x-input-error :messages="$errors->get('email')" class="mt-2"
                                                                style="color:red; list-style-type: none;" />
                                                        </li>

                                                    </ul>

                                                    <span id="pms-submit-button-loading-placeholder-text"
                                                        class="d-none">Processing. Please
                                                        wait...</span>
                                                    <input name="pms_register" type="submit" value="Update"
                                                        style="margin-right:20px !important;">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mt-4 mt-md-0">
                                    <div class="gen-img-main">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12 mt-4 mt-lg-0">
                    <div class="widget widget_recent_entries">

                        <h2 class="widget-title">Subscriptions</h2>
                        <ul>

                            @php
                            use App\Models\Subscription;

                            foreach($user_subscriptions as $value) {

                                $subscription_id   = $value->subscription_id;
                                $duration_id       = $value->duration_id;

                                if ($duration_id == 1) $duration_str = "Per Week";
                                elseif ($duration_id == 2) $duration_str = "Per Month";
                                elseif ($duration_id == 3) $duration_str = "Per 3 Months";
                                elseif ($duration_id == 4) $duration_str = "Per 6 Months";
                                elseif ($duration_id == 5) $duration_str = "Per a Year";
                                else $duration_str = "";

                                $subscriptionplan      = Subscription::find($subscription_id);
                                $plan_name             = $subscriptionplan->plan_name;
                                $user_type_category    = $subscriptionplan->user_type_category;

                                $user_type_category_is = $style = '';
                                if ($user_type_category == 1) $user_type_category_is = 'General items';
                                elseif ($user_type_category == 2) $user_type_category_is = 'car';
                                elseif ($user_type_category == 3) $user_type_category_is = 'Rental Property';
                                elseif ($user_type_category == 4) $user_type_category_is = 'Sale Property';
                                else $user_type_category_is = 'Property'; @endphp

                                <li>
                                    Plan Name       : {{ $plan_name }} <br>
                                    Category        : {{ $user_type_category_is }} <br>
                                    Plan Duration   : {{ $duration_str }} <br>

                                </li>
                                <hr style="color:white;">

                            @php } @endphp

                        </ul>
                    </div>
                    <div class="widget widget_recent_comments">
                        <h2 class="widget-title">My products</h2>


                        <ul id="recentcomments">

                            @foreach ($products as $value)
                                <li class="recentcomments"><span class="comment-author-link"></span><a href="{{ route('frontend.product.ProductEdit',['id'=>$value->id]) }}"
                                        class="pl-0" style="color:white">{{ $value->product_name }}</a></li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- blog single -->

    <!-- footer start -->

    @include('frontend.templates.footer')

    <!-- footer End -->

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

<!-- Mirrored from template.gentechtreedesign.com/html/streamlab/red-html/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jul 2023 13:00:22 GMT -->

</html>
