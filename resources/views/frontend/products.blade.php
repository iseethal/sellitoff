<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from template.gentechtreedesign.com/html/streamlab/red-html/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jul 2023 12:55:03 GMT -->
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
                                Products
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">products</li>
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
                <div class="col-lg-12">
                    <div class="row">

                        @foreach ($products as $item)

                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                <div class="gen-movie-contain">
                                    <div class="gen-movie-img">

                                        {{-- <img src="images/background/asset-5.jpg" alt="streamlab-image"> --}}

                                         <img src=" {{ asset('backend/image/product/'.$item->image) }}" 
                                        style="width: 392px; height: 220px;"> 

                                        <div class="gen-movie-add">
                                        </div>

                                    </div>
                                    <div class="gen-info-contain">
                                        <div class="gen-movie-info">
                                            <h3><a>{{ $item->product_name }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section-1 End -->

   
    <!-- Map End -->

    <!-- footer start -->

    @include('frontend.templates.footer')
