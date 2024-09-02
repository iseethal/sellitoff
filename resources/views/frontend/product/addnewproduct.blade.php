<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        hr.new {
            border: 1px solid #ff9e00;
            ;
        }
    </style>
</head>

<body>


    @include('frontend.templates.header')
    <!--========== Header ==============-->

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h2>
                                ADD PRODUCT
                            </h2>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">add product</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <Section class="gen-section-padding-3 gen-top-border">
        <div class="container container-2">
            <div class="row gt-form">

                @include('frontend.templates.toastr-notifications')

                <div class="col-xl-12">

                    @php

                        $categoryname = App\Models\Category::where('id', $category_id)
                            ->pluck('category_name')
                            ->first();

                        $subcategoryname = App\Models\Subcategory::where('id', $subcategory_id)
                            ->pluck('subcategory_name')
                            ->first();

                        $subofsubcategoryname = App\Models\Subsubcategory::where('id', $sub_subcategory_id)
                            ->pluck('sub_subcategory_name')
                            ->first();

                    @endphp

                    <div>
                        <p style="text-align:left; font-size:20px">
                            {{ strtoupper($categoryname) }}@if ($subcategoryname != null)
                                / {{ $subcategoryname }}
                                @endif @if ($subofsubcategoryname != null)
                                    /
                                    {{ $subofsubcategoryname }}
                                @endif
                                <span style="float:right"> <a href="{{ route('frontend.product.productdivision') }}"
                                        class="d-inline-block">BACK</a> </span>
                        </p>

                    </div>
                    <!-- Row -->

                    <form action="{{ route('frontend.product.storeproductt') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                            <div class="">
                                <input type="hidden" value="{{ $category_id }}" name="category_id" id="category_id">
                                <input type="hidden" value="{{ $subcategory_id }}" name="subcategory_id" id="subcategory_id">
                                <input type="hidden" value="{{ $sub_subcategory_id }}" name="sub_subcategory_id" id="sub_subcategory_id">

                                @if (!$category_filter->isEmpty())
                                    <div>
                                        <p style="text-align:left; font-size:16px;color:#ff9e00;"
                                            class="d-inline-block">
                                            <b>FILTERS</b>
                                        </p>

                                    </div>
                                    @foreach ($category_filter as $value)

                                        @php
                                        $filter_id     = $value->filter_id;
                                        $title         = App\Models\Filter::where('id', $filter_id)->pluck('filter_title')->first();
                                        $filteroptions = App\Models\Filteroption::where('is_deleted', '<>', 1)->where('filter_id', $value->filter_id)->get();
                                        @endphp

                                        @if(($filter_id!=2) && ($filter_id!=5) && ($filter_id!=6))

                                            @if ($title != null)
                                            <div class="row row-xs align-items-center mg-b-20 mb-4">

                                                <div class="col-md-4">
                                                    <label class="mg-b-0"> {{ strtoupper($title) }}
                                                    </label>
                                                </div>
                                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                    <select name="option_name[]" id="option_name[]">
                                                        <option value="0">Choose one</option>
                                                        @foreach ($filteroptions as $options)
                                                            <option value="{{ $options->id }}">
                                                                {{ $options->option_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @endif

                                        @else

                                            @if($filter_id==2)

                                                @if ($title != null)
                                                <div class="row row-xs align-items-center mg-b-20 mb-4">
                                                    <div class="col-md-4">
                                                        <label class="mg-b-0"> {{ strtoupper($title) }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                        <select name="region" id="region">
                                                            <option value="0">Choose one</option>
                                                            @foreach ($filteroptions as $options)
                                                                <option value="{{ $options->id }}">{{ $options->option_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @endif

                                            @elseif($filter_id==5)

                                                <!-- county -->
                                                @if ($title != null)
                                                <div class="row row-xs align-items-center mg-b-20 mb-4">
                                                    <div class="col-md-4">
                                                        <label class="mg-b-0"> {{ strtoupper($title) }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                        <select name="county" id="county">
                                                            <option value="0">Choose one</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @endif
                                                <!-- ends -->

                                            @else

                                                <!-- place -->
                                                @if ($title != null)
                                                <div class="row row-xs align-items-center mg-b-20 mb-4">
                                                    <div class="col-md-4">
                                                        <label class="mg-b-0"> {{ strtoupper($title) }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                        <select name="place" id="place">
                                                            <option value="0">Choose one</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @endif
                                                <!-- place -->
                                            @endif

                                        @endif

                                    @endforeach
                                @endif
                                <hr class="new">
                                <br><br>

                                <div class="row row-xs align-items-center mg-b-20 mb-4">
                                    <div class="col-md-4">
                                        <label class="mg-b-0"> <b>Product Name</b></label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <input class="" name="product_name" id="product_name"
                                            placeholder="Enter product name" type="text" required>
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mg-b-20 mb-4">
                                    <div class="col-md-4">
                                        <label class="mg-b-0"> <b>Product Price</b></label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <input class="" name="price" id="price"
                                            placeholder="Enter price" type="number" required>
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mg-b-20 mb-4">
                                    <div class="col-md-4">
                                        <label class="mg-b-0"> <b>Description</b></label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <textarea name="description" id="description" cols="10" rows="3" placeholder="Enter Description"></textarea>

                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0"> <b>Image</b></label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <input type="file" name="image" id="image" class="dropify"
                                            style="color: #966b14" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png" required />
                                    </div>
                                </div>

                                <br>
                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0"> <b>Support Images</b></label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" name="support_image1" id="support_image1"
                                            class="dropify" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js"  />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" name="support_image2" id="support_image2"
                                            class="dropify" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" name="support_image3" id="support_image3"
                                            class="dropify" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" name="support_image4" id="support_image4"
                                            class="dropify" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                                    </div>
                                </div>

                                <br>
                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0"> </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" name="support_image5" id="support_image5"
                                            class="dropify" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" name="support_image6" id="support_image6"
                                            class="dropify" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />

                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" name="support_image7" id="support_image7"
                                            class="dropify" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />

                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" name="support_image8" id="support_image8"
                                            class="dropify" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />

                                    </div>
                                </div>

                                <br>
                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0"> </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" name="support_image9" id="support_image9"
                                            class="dropify" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" name="support_image10" id="support_image10"
                                            class="dropify" data-height="200"
                                            accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                                    </div>
                                </div>
                            </div>

                        <br>
                        <div class="form-group row justify-content-end mb-4">
                            <div class="col-md-8 pl-md-2">
                                <input type="submit" value="Submit" class="mt-4">
                            </div>
                        </div>
                </div>

                </form>
                <!-- End Row -->

            </div>
        </div>
        </div>
    </Section>

    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Internal Fileuploads js-->
    <script src="{{ asset('backend/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!-- Map End -->
    <!-- footer start -->

    @include('frontend.templates.footer')
    <!-- footer End -->

    <script>
    $(document).ready(function(){

        // Handle Region change to load counties
        $('#region').change(function(){
            var region = $(this).val();
            if(region){

                $.get('https://demo.gisaxiom.com/sell_it_off/public/getcounties/' + region, function(data){
                // $.get('/getcounties/' + region, function(data){
                    $('#county').empty();
                    $('#county').append('<option value="0">Choose One</option>');

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
                    $('#place').append('<option value="0">Choose One</option>');

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
