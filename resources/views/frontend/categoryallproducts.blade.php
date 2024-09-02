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

    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/logo-1.png" alt="loading">
        </div>
    </div>

    @include('frontend.templates.header')

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
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">products</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                @if (count($categoryallproducts) != 0)

                    @if (count($categoryfilter) > 0)
                        <div class="col-xl-3 col-md-12 order-1 order-xl-1 mt-4 mt-xl-0 pb-4">

                            <div class="widget widget_recent_entries">
                                <h2 class="widget-title">Filters</h2>

                                <form action="{{ route('frontend.storecategoryallproducts', ['id' => Request()->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="">

                                        <div class="row row-xs align-items-center mg-b-20 mb-4">
                                            <div class="col-md-12 mg-t-5 mg-md-t-0">
                                                @foreach ($categoryfilter as $val)
                                                    @php
                                                        $filter_id = $val->filter_id;
                                                        $filter_title = App\Models\Filter::where('id', $filter_id)
                                                            ->pluck('filter_title')
                                                            ->first();
                                                        $filterId       = App\Models\Filter::where('id', $filter_id)
                                                            ->pluck('id')
                                                            ->first();
                                                        $filter_option_title = App\Models\Filteroption::where('filter_id', $filter_id)
                                                            ->select('option_name', 'id')
                                                            ->where('is_deleted', '<>', 1)
                                                            ->get();

                                                    @endphp

                                                    <b style="color:#E58F09;">{{strtoupper( $filter_title)}}</b> <br>

                                                    @if ($filterId == 2 || $filterId == 5 ||  $filterId == 6 )

                                                    @if($filter_id==2)
                                                        <select name="option_name[]" id="region">
                                                            <option value="0">Choose one</option>
                                                            @foreach ($filter_option_title as $options)

                                                                @php
                                                                    $selected = '';
                                                                @endphp
                                                                @if (isset($optionname))
                                                                    @if (in_array($options->id, $optionname))
                                                                        @php $selected = "selected"; @endphp
                                                                    @else
                                                                        @php $selected = ""; @endphp
                                                                    @endif
                                                                @endif
                                                                <option value="{{ $options->id }}" {{ $selected }}>{{ $options->option_name }}</option>
                                                            @endforeach
                                                        </select>

                                                    @elseif($filter_id==5)
                                                        <select name="option_name[]" id="county">
                                                            <option value="0">Choose one</option>
                                                            @foreach ($filter_option_title as $options)

                                                                @php
                                                                    $selected = '';
                                                                @endphp
                                                                @if (isset($optionname))
                                                                    @if (in_array($options->id, $optionname))
                                                                        @php $selected = "selected"; @endphp
                                                                    @else
                                                                        @php $selected = ""; @endphp
                                                                    @endif
                                                                @endif
                                                                <option value="{{ $options->id }}" {{ $selected }}>{{ $options->option_name }}</option>
                                                            @endforeach
                                                        </select>

                                                    @else
                                                        <select name="option_name[]" id="place">
                                                            <option value="0">Choose one</option>
                                                            @foreach ($filter_option_title as $options)
                                                                @php
                                                                    $selected = '';
                                                                @endphp
                                                                @if (isset($optionname))
                                                                    @if (in_array($options->id, $optionname))
                                                                        @php $selected = "selected"; @endphp
                                                                    @else
                                                                        @php $selected = ""; @endphp
                                                                    @endif
                                                                @endif
                                                                <option value="{{ $options->id }}" {{ $selected }}>{{ $options->option_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif

                                                @else


                                                    @foreach ($filter_option_title as $val)
                                                        @php
                                                            $checked = '';
                                                        @endphp

                                                        @if (isset($optionname))
                                                            @if (in_array($val->id, $optionname))
                                                                @php $checked = "checked"; @endphp
                                                            @else
                                                                @php $checked = ""; @endphp
                                                            @endif
                                                        @endif

                                                        <input type="checkbox" {{ $checked }} class="checkbox mt-3"
                                                            name="option_name[]" value="{{ $val->id }}">
                                                        <label style="padding-right:40px;">
                                                            <span
                                                                style="text-transform: capitalize;">{{ $val->option_name }}</span></label>
                                                        <br>
                                                    @endforeach

                                                @endif
                                                @endforeach

                                                @php
                                                    $Filters = App\Models\Filter::get();
                                                    foreach ($Filters as $val) {
                                                        $filter_id = $val->filter_id;
                                                    }
                                                @endphp
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-end mb-4">
                                            <div class="col-md-8 pl-md-2">
                                                <input type="submit" value="Filter" class="mt-4">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif

                @endif

                @if (count($categoryallproducts) == 0)
                    <div style="text-align: center;"><b>No Products are available</b></div>
                @endif

                <div class="col-xl-9 col-md-12 order-2 order-xl-2">
                    <div class="col-lg-12">
                        <div class="row">

                            @foreach ($categoryallproducts as $item)
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

                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-3 movie-grid style-3"  @if(!$urgent_str) style="border:3px solid #d5e3f2; padding:10px;" @else style="border:3px solid rgba(158, 120, 6, 0.911); padding:10px;" @endif>

                                        <a href="{{ route('frontend.product.singleproduct', ['id' => $item->id]) }}">
                                            <div class="gen-movie-contain">
                                                <div class="contain gen-movie-img">
                                                    <img src=" {{ asset('backend/image/product/' . $item->image) }}"
                                                        alt="category-image" style="width: 392px; height: 220px;">
                                                    <span class="top-right badge badge-warning"
                                                        style="z-index:2;">{{ $urgent_str }}</span> <br>
                                                        <span class="top-left badge bg-light text-dark"
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

    @include('frontend.templates.footer')

    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>

    <script>
    $(document).ready(function(){

        // Handle Region change to load counties
        $('#region').change(function(){
            var region = $(this).val();
            if(region){

                $.get('https://demo.gisaxiom.com/sell_it_off/public/getcounties/' + region, function(data){
                // $.get('/getcounties/' + region, function(data){
                    $('#county').empty();
                    $('#county').append('<option value="">Choose One</option>');
                    $('#place').append('<option value="">Choose One</option>');

                    $.each(data, function(key, value){

                        $('#county').append('<option value="'+value+'">'+key+'</option>');

                    });
                });
            }
        });

        // Handle County change to load places
        $('#county').change(function(){
            var county = $(this).val();
            if(county){
                $.get('https://demo.gisaxiom.com/sell_it_off/public/getplaces/' + county, function(data){
                // $.get('/getplaces/' + county, function(data){
                    $('#place').empty();
                    $('#place').append('<option value="">Choose One</option>');

                    $.each(data, function(key, value){

                        $('#place').append('<option value="'+value+'">'+key+'</option>');

                    });
                });
            }
        });

    });
    </script>

</body>
</html>
