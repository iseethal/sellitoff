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
                                Subcategories
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">subcategory</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Icon-Box Start -->




    <!-- Icon-Box End -->

    <!-- Map Start -->
    <!-- Section-1 Start -->

    {{-- @foreach ($subcategory as $item)
         
     @endforeach --}}


    <!-- Section-1 End -->

    <!-- Section-1 Start -->
    <section class="gen-section-padding-3">
        <div class="container">


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($subcategory as $item)

                        
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                    <div class="gen-movie-contain">
                                        <div class="gen-movie-img">

                                            {{-- <img src="images/background/asset-5.jpg" alt="streamlab-image"> --}}
                                            

                                            <img src=" {{ asset('backend/image/subcategory/' . $item->image) }}"
                                              alt="image" style="width: 392px; height: 220px;">

                                            <div class="gen-movie-add">
                                                {{-- <div class="wpulike wpulike-heart">
                                                <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                        type="button" class="wp_ulike_btn wp_ulike_put_image"></button>
                                                </div>
                                            </div> --}}
                                                {{-- <ul class="menu bottomRight">
                                                <li class="share top">
                                                    <i class="fa fa-share-alt"></i>
                                                    <ul class="submenu">
                                                        <li><a href="#" class="facebook"><i
                                                                    class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                        <li><a href="#" class="facebook"><i
                                                                    class="fab fa-instagram"></i></a>
                                                        </li>
                                                        <li><a href="#" class="facebook"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                    </ul>
                                                </li>
                                            </ul> --}}

                                                <div class="movie-actions--link_add-to-playlist dropdown">
                                                    <a class="dropdown-toggle"
                                                        href="{{ route('frontend.allsubsubcategorys', ['id' => $item->id]) }}"
                                                        data-toggle="dropdown"><i class="fa fa-plus" data-toggle="modal"
                                                            data-target="#myModal"></i></a>
                                                    <div class="dropdown-menu mCustomScrollbar">
                                                        <div class="mCustomScrollBox">
                                                            <div class="mCSB_container">
                                                                <a class="login-link" href="#">Sign in to add this
                                                                    movie to
                                                                    a
                                                                    playlist.</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- <div class="gen-movie-action">
                                            <a href="single-movie.html" class="gen-button">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div> --}}

                                        </div>
                                        <div class="gen-info-contain">
                                            <div class="gen-movie-info">
                                                <h3><a
                                                        href="{{ route('frontend.allsubsubcategorys', ['id' => $item->id]) }}">{{ $item->subcategory_name }}</a>
                                                </h3>
                                            </div>

                                            {{-- <div class="gen-movie-meta-holder">
                                            <ul>
                                                <li>2hr 00mins</li>
                                                <li>
                                                    <a href="action.html"><span>Action</span></a>
                                                </li>
                                            </ul>
                                        </div> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="col-lg-12">
                    <div class="gen-load-more-button">
                        <div class="gen-btn-container">
                            <a class="gen-button gen-button-loadmore" href="#">
                                <span class="button-text">Load More</span>
                                <span class="loadmore-icon" style="display: none;"><i
                                        class="fa fa-spinner fa-spin"></i></span>
                            </a>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
    <!-- Section-1 End -->

    {{-- <Section class="gen-section-padding-3 gen-top-border">
        <div class="container container-2">
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="mb-5">Add Product</h2>
                    <form>
                        <div class="row gt-form">
                            <div class="col-md-6 mb-4"><input type="text" name="first_name" placeholder="Your Name">
                            </div>
                            <div class="col-md-6 mb-4"><input type="email" name="your-email" placeholder="Email"></div>
                            <div class="col-md-6 mb-4"><input type="text" name="your-Cell-phone"
                                    placeholder="Cell Phone">
                            </div>
                            <div class="col-md-6 mb-4"><input type="text" name="your-Venue" placeholder="Venue"></div>
                            <div class="col-md-12 mb-4"><textarea name="your-message" rows="6"
                                    placeholder="Your Message"></textarea><br>
                                <input type="submit" value="Send" class="mt-4">
                            </div>
                        </div>
                    </form>
                </div>

             

            </div>
        </div>
    </Section> --}}
    <!-- Map End -->

    <!-- footer start -->

    {{-- modal start --}}

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    {{-- modal end --}}

    @include('frontend.templates.footer')
