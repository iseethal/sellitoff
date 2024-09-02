<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sellit off</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
</head>
<style>
    .modal-header {
        background-color:#494F55 !important;
        /* opacity: 0.5 !important; */
    }
    .modal-body {
        background-color:#494F55 !important;
        /* opacity: 0.5 !important; */
    }
    .modal-footer {
        background-color:#494F55 !important;
        /* opacity: 0.5 !important; */
    }
    li:hover {
        color: #c31520;
    }

    .gen-carousel-movies-style-2 .gen-movie-contain .gen-movie-img:before {
        content: none;
    }

    @media (max-width: 740px) {
        .location {
            font-size: 12px !important;
        }
    }

    @media (max-width: 479px) {
        header#gen-header .gen-bottom-header .navbar .navbar-brand img {
            width: 73px;
        }
    }

    #gen-footer .gen-footer-style-1 .gen-footer-logo {
        width: 150px;
        height: 68px;
    }

    footer#gen-footer .widget ul.menu li a:before {
        background: none;
    }

    /* modal popup */
    .modal-header .close {
        padding: 0px !important;
        margin: 0px !important;
    }
</style>

<body>
    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/sell-logo.png" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!--========== Header ==============-->
    @include('frontend.templates.header')

    <!--========== Header ==============-->

    <!-- owl-carousel Banner Start -->
    <section class="pt-0 pb-0">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="gen-banner-movies banner-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="true" data-loop="true" data-margin="0">

                            @foreach ($sliders as $item)
                                <div class="item" style="background: url('backend/image/slider/{{ $item->image }}')">
                                    <div class="gen-movie-contain-style-2 h-100">
                                        <div class="container h-100">
                                            <div class="row flex-row-reverse align-items-center h-100">
                                                <div class="col-xl-6">
                                                    <div class="gen-front-image">
                                                        {{-- <img src="{{ asset('backend/image/slider/' . $item->image) }}"
                                                            style="height:301px;width:700px;"
                                                            alt="owl-carousel-banner-image"> --}}
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">

                                                    @php
                                                            
                                                    $category_name = App\Models\Category::where('id', $item->category_id)
                                                        ->select('category_name')
                                                        ->get();
                                                    
                                                    foreach ($category_name as $value) {
                                                             $catname    = $value->category_name;
                                                             $catid      = $item->category_id;
                                                        $cat_Arr[$catid] = $catname;
                                                    }
                                                   @endphp

                                                    <div class="gen-movie-info">


                                                        <h2>
                                                            <a id="category_id"
                                                            href="{{ route('frontend.allsubcategorys', ['id' => $item->category_id]) }}"
                                                            onclick="myFunction({{ $item->category_id }})"
                                                            data-toggle="modal"
                                                            data-target="#myModal">
                                                            {{-- {{ $item->title }} --}}

                                                            @if ($item->category_id!=0)
                                                                
                                                            
                                                         <span style="color:white;">  {{ $cat_Arr[$item->category_id] }} </span>
                                                         @endif
                                                        </a>
                                                        </h2>
                                                    </div>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul class="gen-meta-after-title">
                                                            <li class="gen-sen-rating">
                                                            </li>
                                                            </li>
                                                        </ul>

                                                        <p> 
                                                              <h6>  {{ $item->title }}  </h6>
                                                        </p>

                                                        <p> {{ $item->subtitle }}
                                                        </p>
                                                        <p> {{ $item->description }} </p>

                                                    </div>
                                                    <div class="gen-movie-action">
                                                        <div class="gen-btn-container">

                                                        </div>
                                                    </div>
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
    <!-- owl-carousel Banner End -->

    <!-- owl-carousel Videos Section-1 Start -->

    <section class="gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    {{-- <h4 class="gen-heading-title">All Time Hits</h4> --}}
                    <h4 class="gen-heading-title">Categories</h4>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                            <a href="{{ route('frontend.allcategorys') }}" class="gen-button gen-button-flat">
                                <span class="text">View All</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">

                            @foreach ($category as $value)
                                <div class="item">
                                    <div
                                        class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">

                                        <div class="category gen-carousel-movies-style-2 movie-grid style-2">

                                            <!-- <a href="{{ route('frontend.allsubcategorys', ['id' => $value['id']]) }}" id="category_id" onclick="myFunction({{ $value->id }})" data-toggle="modal" data-target="#myModal"> -->

                                            <a href="{{ route('frontend.allsubcategorys', ['id' => $value['id']]) }}" onclick="myFunction({{ $value->id }})" data-toggle="modal" data-target="#myModal">

                                                {{-- <input type="hidden" id="category_id" name="category_id"
                                                    value="{{ $value->id }}"> --}}

                                                <div class="gen-movie-contain">

                                                    <div class="gen-movie-img">

                                                    <!-- <span class="badge badge-danger">Urgent</span>  -->
                                                    <!-- <span class="badge badge-primary">Highlited</span> -->

                                                        <img src=" {{ asset('backend/image/category/' . $value->image) }}"
                                                            alt="owl-carousel-video-image"
                                                            style="width: 392px; height: 220px; border-radius: 13%;">

                                                        <div class="gen-movie-add">
                                                            <div class="movie-actions--link_add-to-playlist dropdown">
                                                                <div class="dropdown-menu mCustomScrollbar">
                                                                    <div class="mCustomScrollBox">
                                                                        <div class="mCSB_container">
                                                                            <a class="login-link"
                                                                                href="register.html">Sign in
                                                                                to add this movie
                                                                                to a
                                                                                playlist.</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="gen-movie-action">

                                                        </div>
                                                    </div>

                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3>

                                                            </h3>
                                                        </div>
                                                        <div class="gen-movie-meta-holder">
                                                            <div class="gen-movie-info">
                                                                <h3>
                                                                    <!-- <a
                                                                        href="{{ route('frontend.allsubcategorys', ['id' => $value->id]) }}"> -->
                                                                        <a href="{{ route('frontend.allsubcategorys', ['id' => $value['id']]) }}"
                                                                            id="category_id" onclick="myFunction({{ $value->id }})"
                                                                            data-toggle="modal" data-target="#myModal">
                                                                        {{ $value->category_name }}
                                                                    </a>
                                                                </h3>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                    <!-- #post-## -->
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    

    @if(count($urgentproducts)>0)
    
    <!-- URGENT PRODUCTS SECTION -->
    <section class="pt-0 gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Urgent products</h4>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                            {{-- <a href="tv-shows-pagination.html" class="gen-button gen-button-flat">
                                <span class="text">View All</span>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">

                            @foreach ($urgentproducts as $item)
                                <div class="item">
                                    <div
                                        class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                        <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                            <div class="gen-movie-contain">
                                                <div class="gen-movie-img">


                                                    <img src=" {{ asset('backend/image/product/' . $item->image) }}"
                                                        alt="image" style="width: 392px; height: 220px; border-radius: 13%;">

                                                    <div class="gen-movie-add">
                                                        <div class="wpulike wpulike-heart">

                                                            {{-- <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                <button type="button"
                                                                    class="wp_ulike_btn wp_ulike_put_image"></button>
                                                            </div> --}}

                                                        </div>
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

                                                        {{-- <div class="movie-actions--link_add-to-playlist dropdown">
                                                            <a class="dropdown-toggle" href="#"
                                                                data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                                            <div class="dropdown-menu mCustomScrollbar">
                                                                <div class="mCustomScrollBox">
                                                                    <div class="mCSB_container">
                                                                        <a class="login-link"
                                                                            href="register.html">Sign in
                                                                            to add this movie
                                                                            to a
                                                                            playlist.</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                    </div>
                                                    <div class="gen-movie-action">

                                                    </div>
                                                </div>
                                                <div class="gen-info-contain">
                                                    <div class="gen-movie-info">
                                                        <h3><a href="{{ route('frontend.product.singleproduct', ['id' => $item->id]) }}">{{ $item->product_name }}</a>
                                                        </h3>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #post-## -->
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ENDS -->
    
    @endif
    
    <!-- Slick Slider start -->
    

    {{-- <div class="main-mail-compose" id="Compose"> --}}

    <div class="modal" id="myModal"></div>

    @include('frontend.templates.footer')


    {{-- new --}}

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
    </script>

   
    <script>
    $("#myModal").on("hidden.bs.modal", function(){
        $("#myModal").html("");
    });


    function myFunction(id) {
            
        var category_id = id;

        $.ajax({
            type: "GET",
            url:"{{ route('frontend.getsubcategory',"category_id") }}",
            data: {
                'id': category_id
            },
            success: function(responseIn) {

                $('#myModal').html(responseIn).show();                      
            }
        });
    }
    </script>

    {{-- new end --}}

</body>

</html>
