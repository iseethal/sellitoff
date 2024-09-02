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
                                Subscriptions
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">subscription</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Pricing Plan Start -->
    <section class="gen-section-padding-3">
        <div class="container container-2">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-4">
                    <div class="gen-price-block text-center">
                        <div class="gen-price-detail">
                            {{-- <span class="gen-price-title"> Individual Pricing </span> --}}
                            <span class="price"> Individual</span>
                            {{-- <h2 class="price">$ 29.00</h2> --}}
                            {{-- <p class="gen-price-duration">/ Per Month</p> --}}
                            <div class="gen-bg-effect">
                                <img src="images/background/asset-54.jpg" alt="stream-lab-image">
                            </div>
                        </div>
                        <ul class="gen-list-info">

                            @foreach ($user_type_category_indidual as $value)
                                @php
                                    
                                    $user_type_category_is = $style = '';
                                    if ($value->user_type_category == 1) {
                                        $user_type_category_is = 'General items';
                                    } elseif ($value->user_type_category == 2) {
                                        $user_type_category_is = 'car';
                                    } elseif ($value->user_type_category == 3) {
                                        $user_type_category_is = 'Rental Property';
                                    } elseif ($value->user_type_category == 4) {
                                        $user_type_category_is = 'Sale Property';
                                    } else {
                                        $user_type_category_is = 'Property';
                                    }
                                    
                                @endphp
                                <li><a href="{{ route('frontend.subscriptonplantypes',['id' => $value->user_type_category]) }}"><span style="color:white">{{ $user_type_category_is }}</span></a></li>
                            @endforeach

                        </ul>
                        {{-- <div class="gen-btn-container button-1">
                            <a href="#" class="gen-button">
                                <span class="text">Purchase now</span>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mt-3 mt-md-0">
                    <div class="gen-price-block text-center active">
                        <div class="gen-price-detail">
                            {{-- <span class="gen-price-title"> Business Pricing </span> --}}
                            <span class="price"> Business</span>
                            {{-- <h2 class="price">$ 99.00</h2> --}}
                            {{-- <p class="gen-price-duration">/ Per Month</p> --}}
                            <div class="gen-bg-effect">
                                <img src="images/background/asset-54.jpg" alt="architek-image">
                            </div>
                        </div>
                        <ul class="gen-list-info">

                            @foreach ($user_type_category_business as $value)
                                @php
                                    
                                    $user_type_category_is = $style = '';
                                    if ($value->user_type_category == 1) {
                                        $user_type_category_is = 'General items';
                                    } elseif ($value->user_type_category == 2) {
                                        $user_type_category_is = 'car';
                                    } elseif ($value->user_type_category == 3) {
                                        $user_type_category_is = 'Rental Property';
                                    } elseif ($value->user_type_category == 4) {
                                        $user_type_category_is = 'Sale Property';
                                    } else {
                                        $user_type_category_is = 'Property';
                                    }
                                    
                                @endphp

                                <li><a href="{{ route('frontend.subscriptonplantypesbussiness',['id' => $value->user_type_category]) }}"><span style="color:white;">{{ $user_type_category_is }}</span></a></li>
                            @endforeach

                        </ul>
                        {{-- <div class="gen-btn-container button-1">
                            <a href="#" class="gen-button">
                                <span class="text">Purchase now</span>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Plan End -->

    @include('frontend.templates.footer')