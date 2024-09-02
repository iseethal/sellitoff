<!DOCTYPE html>
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

    <!-- PAYMENT INTEGRATION -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- ENDS  -->

    <style>
        .gen-comparison-table .table-striped tbody tr:first-child td span:first-child {
            font-size: 16px !important;
        }

        body{
            background-color:#161616;
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

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h2>
                                BUSINESS PLANS
                            </h2>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">Pricing Table</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

@php
     $subscription = session()->get('subscription', []);
     foreach (session('subscription') as $id => $item){

            $sub_id = $item['id'];
     }

     $subscription_id = App\Models\UserSubscription::where('id',$sub_id)->pluck('subscription_id')->first();
     $products        = App\Models\Product::where('subscription_id',$sub_id)->where('is_active',1)->get();
     $item_count      = App\Models\Subscription::where('id',Request()->id)->pluck('items')->first();

@endphp

<form action="{{ route('subscription.cart')}}" method="post">
    @csrf

    <input type="hidden" name="id" value="{{ Request()->id}}">

    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-style-1">
                        <div class="row">

                        <input type="hidden" id="item_count" value="{{ $item_count }}">

                        @foreach ($products as $product)

                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                    <div class="gen-movie-contain">
                                        <div class="gen-movie-img">
                                            <img src="{{ asset('backend/image/product/' . $product->image) }}" alt="streamlab-image">
                                            <div class="gen-movie-add">
                                                <div class="wpulike wpulike-heart">
                                                    <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                        <input  type="checkbox" class="checkbox"  id="product_ids" name="product_ids[{{ $product->id }}]" value="{{ $product->id}}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="gen-info-contain">
                                            <div class="gen-movie-info">
                                                <h3 style="color: #ff9900;"><a href="{{ route('frontend.product.singleproduct', ['id' => $product->id]) }}">{{$product->product_name}}</a></h3>
                                            </div>
                                            {{-- <div class="gen-movie-meta-holder">
                                                <ul>
                                                    <li>1 Season</li>
                                                    <li>
                                                        <a href="adventure.html"><span>Adventure</span></a>
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
                <div class="col-lg-12">
                    <div class="gen-load-more-button">
                        <div class="gen-btn-container">
                            {{-- <a class="gen-button gen-button-loadmore" href="#">
                                <span class="button-text">Next</span>
                                <span class="loadmore-icon" style="display: none;"><i
                                        class="fa fa-spinner fa-spin"></i></span>
                            </a> --}}
                            <button type="submit" class="gen-button gen-button-loadmore">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</form>
@include('frontend.templates.footer')

<script>

    var maxCheckboxCount    = document.getElementById("item_count").value;
    var checkboxes          = document.querySelectorAll('.checkbox');

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {

            var checkedCheckboxes = document.querySelectorAll('.checkbox:checked');

            if (checkedCheckboxes.length > maxCheckboxCount) {
            checkbox.checked = false;
            }
        });
    });
  </script>
