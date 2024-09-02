<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sellitoff</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />

    <link href="{{ asset('backend/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <style>
        .dropify-wrapper {
            background-color: #221f1f !important;
        }

        .dropify-wrapper .dropify-loader {
            position: none;
            top: 0px;
            right: 0px;
            display: none;
            z-index: 0;
        }

        input[type=file]::file-selector-button {
            border: 2px solid #221f1f;

            color: white;
            padding: .2em .4em;
            border-radius: .2em;
            background-color: #221f1f;
            transition: 1s;
        }

        input[type=file]::file-selector-button:hover {
            background-color: #221f1f;
            border: 2px solid #221f1f;
            color: white;
        }

        en-banner-movies .slick-slider .next.slick-arrow:hover {
            background: #ff9900;
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

    @include('frontend.templates.header')
    @include('frontend.templates.toastr-notifications')
    <!--========== Header ==============-->

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h2>
                                PRODUCTS
                            </h2>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">Single Product</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-12 order-2 order-xl-1 mt-4 mt-xl-0">

                    @php
                        $category = App\Models\Category::where('id', $single_product->category_id)
                            ->pluck('category_name')
                            ->first();
                        $productfilteroption = App\Models\ProductFilterOptions::where('product_id', Request()->id)
                            ->select('filter_option_id')
                            ->get();
                    @endphp
                    <div class="widget widget_categories">
                        <h2 class="widget-title">Category</h2>
                        <ul>
                            <li class="cat-item cat-item-1">{{ $category }}</li>
                        </ul>
                    </div>
                    @if (!$productfilteroption->isEmpty())

                        <div class="widget widget_meta">
                            <h2 class="widget-title">Details</h2>
                            <ul>

                                @foreach ($productfilteroption as $value)
                                    @php
                                        $filteroptionname = App\Models\Filteroption::where('id', $value->filter_option_id)
                                            ->select('option_name')
                                            ->get();
                                        $filterid = App\Models\Filteroption::where('id', $value->filter_option_id)
                                            ->select('filter_id')
                                            ->get();

                                    @endphp
                                    @foreach ($filterid as $value)
                                        @php
                                            $filterid = App\Models\Filter::where('id', $value->filter_id)
                                                ->select('filter_title')
                                                ->get();
                                        @endphp

                                        <li>
                                            <div class="row">
                                                @foreach ($filterid as $value)
                                                    <div class="col-5">{{ $value->filter_title }}</div>
                                                @endforeach

                                                @foreach ($filteroptionname as $value)
                                                    <div class="col-7">{{ $value->option_name }}</div>
                                                @endforeach
                                            </div>
                                        </li>
                                    @endforeach
                                @endforeach

                            </ul>
                        </div>
                    @endif

                </div>


                <div class="col-xl-9 col-md-12 order-1 order-xl-2">
                    <div class="container">
                        <div class="home-singal-silder">
                            <div class="gen-nav-movies gen-banner-movies">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="slider slider-for">
                                            <!-- Slider Items -->

                                            <div class="slider-item"
                                                style="background: url('{{ asset('backend/image/product/' . $single_product->image) }}')">
                                                <div class="gen-slick-slider h-100">
                                                    <div class="gen-movie-contain h-100">
                                                        <div class="container h-100">
                                                            <div class="row align-items-center h-100">
                                                                <div class="col-lg-6">
                                                                    <br><br><br><br><br><br><br><br>

                                                                    <div class="gen-movie-action">
                                                                        <div class="gen-btn-container button-1">


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="slider-item"
                                                style="background: url('{{ asset('backend/image/product/' . $single_product->support_image1) }}')">
                                                <div class="gen-slick-slider h-100">
                                                    <div class="gen-movie-contain h-100">
                                                        <div class="container h-100">
                                                            <div class="row align-items-center h-100">
                                                                <div class="col-lg-6">
                                                                    <br><br><br><br><br><br><br><br>

                                                                    <div class="gen-movie-action">
                                                                        <div class="gen-btn-container button-1">


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="slider-item"
                                                style="background: url('{{ asset('backend/image/product/' . $single_product->support_image2) }}')">
                                                <div class="gen-slick-slider h-100">
                                                    <div class="gen-movie-contain h-100">
                                                        <div class="container h-100">
                                                            <div class="row align-items-center h-100">
                                                                <div class="col-lg-6">
                                                                    <br><br><br><br><br><br><br><br>

                                                                    <div class="gen-movie-action">
                                                                        <div class="gen-btn-container button-1">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="slider-item"
                                                style="background: url('{{ asset('backend/image/product/' . $single_product->support_image3) }}')">
                                                <div class="gen-slick-slider h-100">
                                                    <div class="gen-movie-contain h-100">
                                                        <div class="container h-100">
                                                            <div class="row align-items-center h-100">
                                                                <div class="col-lg-6">
                                                                    <br><br><br><br><br><br><br><br>

                                                                    <div class="gen-movie-action">
                                                                        <div class="gen-btn-container button-1">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="slider-item"
                                                style="background: url('{{ asset('backend/image/product/' . $single_product->support_image4) }}')">
                                                <div class="gen-slick-slider h-100">
                                                    <div class="gen-movie-contain h-100">
                                                        <div class="container h-100">
                                                            <div class="row align-items-center h-100">
                                                                <div class="col-lg-6">
                                                                    <br><br><br><br><br><br><br><br>

                                                                    <div class="gen-movie-action">
                                                                        <div class="gen-btn-container button-1">
                                                                            h
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($single_product->support_image5 != null)
                                                <div class="slider-item"
                                                    style="background: url('{{ asset('backend/image/product/' . $single_product->support_image5) }}')">
                                                    <div class="gen-slick-slider h-100">
                                                        <div class="gen-movie-contain h-100">
                                                            <div class="container h-100">
                                                                <div class="row align-items-center h-100">
                                                                    <div class="col-lg-6">
                                                                        <br><br><br><br><br><br><br><br>

                                                                        <div class="gen-movie-action">
                                                                            <div class="gen-btn-container button-1">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($single_product->support_image6 != null)
                                                <div class="slider-item"
                                                    style="background: url('{{ asset('backend/image/product/' . $single_product->support_image6) }}')">
                                                    <div class="gen-slick-slider h-100">
                                                        <div class="gen-movie-contain h-100">
                                                            <div class="container h-100">
                                                                <div class="row align-items-center h-100">
                                                                    <div class="col-lg-6">
                                                                        <br><br><br><br><br><br><br><br>

                                                                        <div class="gen-movie-action">
                                                                            <div class="gen-btn-container button-1">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($single_product->support_image7 != null)
                                                <div class="slider-item"
                                                    style="background: url('{{ asset('backend/image/product/' . $single_product->support_image7) }}')">
                                                    <div class="gen-slick-slider h-100">
                                                        <div class="gen-movie-contain h-100">
                                                            <div class="container h-100">
                                                                <div class="row align-items-center h-100">
                                                                    <div class="col-lg-6">
                                                                        <br><br><br><br><br><br><br><br>

                                                                        <div class="gen-movie-action">
                                                                            <div class="gen-btn-container button-1">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($single_product->support_image8 != null)
                                                <div class="slider-item"
                                                    style="background: url('{{ asset('backend/image/product/' . $single_product->support_image8) }}')">
                                                    <div class="gen-slick-slider h-100">
                                                        <div class="gen-movie-contain h-100">
                                                            <div class="container h-100">
                                                                <div class="row align-items-center h-100">
                                                                    <div class="col-lg-6">
                                                                        <br><br><br><br><br><br><br><br>

                                                                        <div class="gen-movie-action">
                                                                            <div class="gen-btn-container button-1">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($single_product->support_image9 != null)
                                                <div class="slider-item"
                                                    style="background: url('{{ asset('backend/image/product/' . $single_product->support_image9) }}')">
                                                    <div class="gen-slick-slider h-100">
                                                        <div class="gen-movie-contain h-100">
                                                            <div class="container h-100">
                                                                <div class="row align-items-center h-100">
                                                                    <div class="col-lg-6">
                                                                        <br><br><br><br><br><br><br><br>

                                                                        <div class="gen-movie-action">
                                                                            <div class="gen-btn-container button-1">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($single_product->support_image10 != null)
                                                <div class="slider-item"
                                                    style="background: url('{{ asset('backend/image/product/' . $single_product->support_image10) }}')">
                                                    <div class="gen-slick-slider h-100">
                                                        <div class="gen-movie-contain h-100">
                                                            <div class="container h-100">
                                                                <div class="row align-items-center h-100">
                                                                    <div class="col-lg-6">
                                                                        <br><br><br><br><br><br><br><br>

                                                                        <div class="gen-movie-action">
                                                                            <div class="gen-btn-container button-1">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            <!-- Slider Items -->
                                        </div>

                                        <div class="slider slider-nav">

                                            @if ($single_product->image != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->image) }}"
                                                            alt="steamlab-image">
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($single_product->support_image1 != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->support_image1) }}"
                                                            alt="steamlab-image">
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($single_product->support_image2 != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->support_image2) }}"
                                                            alt="streamlab-image">
                                                    </div>

                                                </div>
                                            @endif

                                            @if ($single_product->support_image3 != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->support_image3) }}"
                                                            alt="streamlab-image">
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($single_product->support_image4 != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->support_image4) }}"
                                                            alt="streamlab-image">
                                                    </div>

                                                </div>
                                            @endif

                                            @if ($single_product->support_image5 != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->support_image5) }}"
                                                            alt="streamlab-image">
                                                    </div>

                                                </div>
                                            @endif


                                            @if ($single_product->support_image6 != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->support_image6) }}"
                                                            alt="streamlab-image">
                                                    </div>

                                                </div>
                                            @endif


                                            @if ($single_product->support_image7 != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->support_image7) }}"
                                                            alt="streamlab-image">
                                                    </div>

                                                </div>
                                            @endif


                                            @if ($single_product->support_image8 != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->support_image8) }}"
                                                            alt="streamlab-image">
                                                    </div>

                                                </div>
                                            @endif


                                            @if ($single_product->support_image9 != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->support_image9) }}"
                                                            alt="streamlab-image">
                                                    </div>

                                                </div>
                                            @endif


                                            @if ($single_product->support_image10 != null)
                                                <div class="slider-nav-contain">
                                                    <div class="gen-nav-img">
                                                        <img src="{{ asset('backend/image/product/' . $single_product->support_image10) }}"
                                                            alt="streamlab-image">
                                                    </div>

                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            @php
                            $product_user_id = $single_product->user_id;
                            $show_mobile = App\Models\User::where('id', $product_user_id)
                                ->pluck('show_mobile')
                                ->first();
                            $phone = App\Models\User::where('id', $product_user_id)
                                ->pluck('phone')
                                ->first();
                            $email = App\Models\User::where('id', $product_user_id)
                                ->pluck('email')
                                ->first();

                        @endphp
                            <div class="gen-blog-contain">

                                <div style="text-align:left; " class="gen-blog-title ">

                                    <b> {{ strtoupper($single_product->product_name) }} </b> &nbsp;&nbsp;&nbsp;
                                    <span>

                                        @auth
                                            @php
                                                $user = Auth::user();
                                                $user_type = $user->user_type;
                                                $user_id = $user->id;
                                            @endphp
                                            @if ($single_product->user_id != $user_id)
                                                <span class="text"><a class="gen-button"
                                                        href="mailto:{{$email}}"
                                                        style="background-color: #ff9900;line-height: .5;">Contact
                                                        seller</a> </span>
                                            @else
                                                <span class="text"><a class="gen-button"
                                                        href="{{ route('frontend.product.ProductEdit', ['id' => $single_product['id']]) }}"
                                                        style="background-color: #ff9900;line-height: .5;">Edit Product</a>
                                                </span>
                                            @endif
                                        @else
                                            <span class="text"><a class="gen-button"href="{{ route('frontend.get-singleproduct',['id' =>$single_product->id]) }}"
                                                    style="background-color: #ff9900;line-height: .5;">Contact
                                                    seller</a> </span>

                                        @endauth
                                    </span>
                                 @auth
                                    <br>
                                    @if ($show_mobile == 1)
                                        <span style="color:#ff9900;"> <i class="fa fa-phone" aria-hidden="true"></i> : </span> {{ $phone }}<br>
                                        <span style="color:#ff9900;"> <i class="fa fa-envelope" aria-hidden="true"></i> : </span>{{ $email }}

                                    @endif
                                 @endauth


                                </div>

                              Price : £ {{ $single_product->price }} <br>
                                {{ $single_product->description }}


                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </section>

    @include('frontend.templates.footer')
