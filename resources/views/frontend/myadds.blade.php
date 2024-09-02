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

    <style>
        /* Increase the size of the checkbox */
        .checkbox {
            width: 18px !important;
            height: 18px !important;
        }

        .contain {
            position: relative;
            text-align: center;
            color: white;
        }

        .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
        }

        .top-left {
            position: absolute;
            top: 30px;
            right: 16px;
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
    <div class="gen-breadcrumb" style="background-image: url('images/background/tree.jpeg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                               My Products
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">My products</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Icon-Box Start -->
    <!-- Section-1 Start -->

    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-md-12 order-2 order-xl-2 ">
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($products as $item)
                                <div class="col-xl-3 col-lg-3 col-md-6">

                                @php
                                $urgent = $item->urgent;
                                $highlight = $item->highlight;

                                if ($urgent == 1) {
                                    $urgent_str = 'Urgent';
                                } else {
                                    $urgent_str = '';
                                }
                                if ($highlight == 1) {
                                    $highlight_str = 'Highlight';
                                } else {
                                    $highlight_str = '';
                                }
                                @endphp

                                    <div class="gen-carousel-movies-style-3 movie-grid style-3" @if ($urgent_str) style="border:3px solid rgb(229 143 9); padding:10px;" @elseif ($highlight_str) style="border:3px solid white; padding:10px;" @endif>

                                        <a href="{{ route('frontend.product.singleproduct', ['id' => $item->id]) }}">
                                            <div class="gen-movie-contain">
                                                <div class="contain gen-movie-img">

                                                    {{-- <div class="container"> --}}

                                                    {{-- <img src="images/background/asset-5.jpg" alt="streamlab-image"> --}}

                                                    <img src=" {{ asset('backend/image/product/' . $item->image) }}"
                                                        alt="owl-carousel-video-image"
                                                        style="width: 270px; height: 182px;">



                                                    <span class="top-right badge badge-warning"
                                                        style="z-index:2;">{{ $urgent_str }}</span> <br>
                                                    <span class="top-left badge badge-light"
                                                        style="z-index:2;">{{ $highlight_str }}</span>
                                                    <div class="gen-movie-add">
                                                    </div>

                                                </div>
                                                <div class="gen-info-contain">
                                                    <div class="gen-movie-info">
                                                        <h3>{{ $item->product_name }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Section-1 End -->


    <!-- Map End -->

    <!-- footer start -->

    @include('frontend.templates.footer')

    <!-- footer End -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->


</body>

</html>
