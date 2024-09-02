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
    <!--========== Header ==============-->

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h2>
                                ADD PRODUCT DIVISIONSs
                            </h2>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=" {{ route('frontend.home')}}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">Add Products Divisions</li>
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

                {{-- <div class="col-xl-12">

          <center>
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
          </center>

            </div> --}}

                <div class="col-xl-12">

                    <form action="{{ route('frontend.product.addnewproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">

                            <div class="row row-xs align-items-center mg-b-20 mb-4">
                                <div class="col-md-4">
                                    <label class="mg-b-0 ">Category</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class=" select select2" name="category_id" style="border-color:#b81d24;"
                                        id="category_id" required>
                                        <option value="">choose one</option>
                                        @foreach ($category as $item)

                                            <option value="{{ $item->id }}">{{ $item->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row row-xs align-items-center mg-b-20 mb-4" id="subcategory_id">
                                <div class="col-md-4">
                                    <label class="mg-b-0">Subcategory</label>
                                </div>

                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <select class="subcategory_id  select select2" name="subcategory_id">
                                        <option value="">No Result Found</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20 mb-4" id="sub_subcategory_id">
                                <div class="col-md-4">
                                    <label class="mg-b-0">Sub of Subcategory</label>
                                </div>

                                <div class="col-md-8 mg-t-5 mg-md-t-0" placeholder="choose one">
                                    <select class="sub_subcategory_id  select select2" name="sub_subcategory_id">
                                        <option value="">No Result Found</option>
                                    </select>
                                </div>
                            </div>





                            <div class="form-group row justify-content-end mb-4">
                                <div class="col-md-8 pl-md-2">
                                    <input type="submit" value="Next" class="mt-4">
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



    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var categoryID = $(this).val();

                if (categoryID) {
                    $.ajax({
                        url: 'https://demo.gisaxiom.com/sell_it_off/public/getsubcategory/' + categoryID,
                        // url:"{{ route('frontend.getsubcategory',"categoryID") }}",
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            if (data.length == 0) {

                                $('#subcategory_id').hide();

                                $('#sub_subcategory_id').hide();
                            } else {

                                $('#subcategory_id').show();

                                $('#sub_subcategory_id').show();

                                $('select[name="subcategory_id"]').empty();

                                $('.subcategory_id').html(
                                    '<option value="0"> Select  Subcategory </option>');
                                $.each(data, function(key, value) {
                                    $('select[name="subcategory_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .subcategory_name + '</option>');
                                });
                            }
                        }
                    });
                } else {
                    $('select[name="subcategory_id"]').empty();
                }
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="subcategory_id"]').on('change', function() {
                var subcategoryID = $(this).val();

                if (subcategoryID) {
                    $.ajax({
                        url: 'https://demo.gisaxiom.com/sell_it_off/public/getsub_subcategory/' + subcategoryID,
                        // url:"{{ route('getsub-subcategory', 'subcategoryID') }}",
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            if (data.length == 0) {

                                $('#sub_subcategory_id').hide();
                            } else {

                                $('#sub_subcategory_id').show();

                                $('select[name="sub_subcategory_id"]').empty();

                                $('.sub_subcategory_id').html(
                                    '<option value="0"> Select Sub of Subcategory </option>'
                                    );

                                $.each(data, function(key, value) {
                                    $('select[name="sub_subcategory_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .sub_subcategory_name + '</option>');
                                });
                            }
                        }
                    });
                } else {
                    $('select[name="sub_subcategory_id"]').empty();
                }
            });
        });
    </script>

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var categoryID = $(this).val();

                if (categoryID) {
                    $.ajax({
                        url: '/getfilters/' + categoryID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            var result = data;
                            $('#filter').html(result);

                        }
                    });
                }

            });
        });
    </script> --}}

    @include('frontend.templates.footer')
