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
        .gen-comparison-table .table-striped tbody tr:first-child td span:first-child {
            font-size:16px !important;
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
                                BUSINESS PLANS
                            </h2>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">Pricing Table</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

     <!-- business Pricing Table Start -->
     <div class="gen-section-padding-3">
        <div class="container container-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-comparison-table table-style-1 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="cell-inner">
                                        </div>
                                        <div class="cell-tag">
                                            <span></span>
                                        </div>
                                    </th>

                                    @foreach ($bussiness_plans as $value)
                                    @php
                                        $conditions = $value->conditions;
                                    @endphp
                                        <th>
                                            <div class="cell-inner">
                                                <span title="{{ $conditions }}">{{ $value->plan_name }} </span>
                                            </div>
                                            <div class="cell-tag">
                                                <span></span>
                                            </div>
                                        </th>
                                    @endforeach

                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>Item Count</span>
                                        </div>
                                    </td>

                                    @foreach ($bussiness_plans as $item)
                                        <td>
                                            <div class="cell-inner">
                                                <span>{{ $item->items }}</span>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>Photos</span>
                                        </div>
                                    </td>

                                    @foreach ($bussiness_plans as $item)
                                        <td>
                                            <div class="cell-inner">
                                                <span>{{ $item->photo_count }}</span>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>


                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>Pricing Per Week</span>
                                        </div>
                                    </td>

                                    @foreach ($bussiness_plans as $item)
                                        <td>
                                            <div class="cell-inner">
                                                <span>£ {{ $item->pricing_per_week }}</span>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>Pricing Per Month</span>
                                        </div>
                                    </td>

                                    @foreach ($bussiness_plans as $item)
                                        <td>
                                            <div class="cell-inner">
                                                <span>£ {{ $item->pricing_per_month }}</span>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>Pricing Per 3Month</span>
                                        </div>
                                    </td>

                                    @foreach ($bussiness_plans as $item)
                                        <td>
                                            <div class="cell-inner">
                                                <span>£ {{ $item->price_3months }}</span>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>Pricing Per 6Month</span>
                                        </div>
                                    </td>

                                    @foreach ($bussiness_plans as $item)
                                        <td>
                                            <div class="cell-inner">
                                                <span>£ {{ $item->price_6months }}</span>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                            <span>Pricing Per Year</span>
                                        </div>
                                    </td>

                                    @foreach ($bussiness_plans as $item)
                                        <td>
                                            <div class="cell-inner">
                                                <span>£ {{ $item->pricing_per_yr }}</span>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <td>
                                        <div class="cell-inner">
                                        </div>
                                    </td>
                                    @foreach ($bussiness_plans as $value)
                                        <td>
                                            <div class="cell-inner">
                                            </div>
                                            <div class="cell-btn-holder">
                                                <div class="gen-btn-container">
                                                    <div class="gen-button-block">
                                                        <a class="gen-button" href="{{ route('frontend.subscriptonplandetails',['id' => $value->id ]) }}">
                                                            <span class="text" >Subscribe</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('frontend.templates.footer')

