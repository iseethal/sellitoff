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


        .gen-carousel-movies-style-3 .gen-movie-contain .gen-movie-img:before {
            content: none;
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
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                categories
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">category</li>
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


    <!-- Section-1 End -->

    <!-- Section-1 Start -->
    <section class="gen-section-padding-3">
        <div class="container">


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($category as $item)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="gen-carousel-movies-style-3 movie-grid style-3">

                                    {{-- new --}}

                                    <a href="{{ route('frontend.allsubcategorys', ['id' => $item['id']]) }}"
                                        id="category_id" onclick="myFunction({{ $item->id }})" data-toggle="modal"
                                        data-target="#myModal">

                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">

                                                {{-- <img src="images/background/asset-5.jpg" alt="streamlab-image"> --}}

                                                <img src=" {{ asset('backend/image/category/' . $item->image) }}"
                                                    alt="owl-carousel-video-image" style="width: 392px; height: 220px;">


                                                <div class="gen-movie-add">


                                                    <div class="movie-actions--link_add-to-playlist dropdown">

                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="#">Sign in to add
                                                                        this
                                                                        movie to
                                                                        a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3>
                                                        <!-- <a
                                                            href="{{ route('frontend.allsubsubcategorys', ['id' => $item->id]) }}"> -->
                                                            <a href="{{ route('frontend.allsubcategorys', ['id' => $item['id']]) }}"
                                        id="category_id" onclick="myFunction({{ $item->id }})" data-toggle="modal"
                                        data-target="#myModal">
                                                            {{ $item->category_name }}
                                                        </a>
                                                    </h3>
                                                </div>



                                            </div>
                                        </div>

                                    </a>

                                    {{-- end new --}}

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

    {{-- modal start --}}

    <!-- The Modal -->

  

    <div class="modal" id="myModal">

    </div>

    {{-- modal end --}}

    @include('frontend.templates.footer')

    <!-- footer End -->


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


