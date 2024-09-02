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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- ENDS  -->

    <style>
        .gen-comparison-table .table-striped tbody tr:first-child td span:first-child {
            font-size: 16px !important;
        }

        body {
            background-color: #161616;
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

    @php
        $subscription = session()->get('subscription', []);
        if (session('subscription')) {
            foreach (session('subscription') as $id => $item) {
                $sub_id = $item['id'];
            }

            $subscription_id = App\Models\UserSubscription::where('id', $sub_id)
                ->pluck('subscription_id')
                ->first();
            $products = App\Models\Product::where('subscription_id', $sub_id)->get();
        }

    @endphp



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
                                        <th>
                                            <div class="cell-inner">
                                                <span>{{ $value->plan_name }}</span>
                                            </div>
                                            <div class="cell-tag">
                                                <span></span>
                                            </div>
                                        </th>
                                    @endforeach

                                    <th>
                                        <div class="cell-inner">
                                        </div>
                                        <div class="cell-tag">
                                            <span></span>
                                        </div>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>


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

                                        <td>
                                            <div class="cell-inner">
                                            </div>
                                            <div class="cell-btn-holder">
                                                <div class="gen-btn-container">
                                                    <div class="gen-button-block">

                                                        <form action="{{ route('session') }}" method="POST">
                                                            <input type="hidden" name="subscription_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="plan_id" value="1">

                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type='hidden' name="total"
                                                                value="{{ $item->pricing_per_week }}">
                                                            <input type='hidden' name="productname"
                                                                value="Subscription per week">
                                                            <button class="btn btn-success" type="submit"
                                                                id="checkout-live-button">
                                                                <i class="fa fa-money"></i> Pay £
                                                                {{ $item->pricing_per_week }}
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
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

                                        <td>
                                            <div class="cell-inner">
                                            </div>
                                            <div class="cell-btn-holder">
                                                <div class="gen-btn-container">
                                                    <div class="gen-button-block">

                                                        <form action="{{ route('session') }}" method="POST">
                                                            <input type="hidden" name="subscription_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="plan_id" value="2">

                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type='hidden' name="total"
                                                                value="{{ $item->pricing_per_month }}">
                                                            <input type='hidden' name="productname"
                                                                value="Subscription per month">
                                                            <button class="btn btn-success" type="submit"
                                                                id="checkout-live-button">
                                                                <i class="fa fa-money"></i> Pay £
                                                                {{ $item->pricing_per_month }}
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
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

                                        <td>
                                            <div class="cell-inner">
                                            </div>
                                            <div class="cell-btn-holder">
                                                <div class="gen-btn-container">
                                                    <div class="gen-button-block">

                                                        <form action="{{ route('session') }}" method="POST">
                                                            <input type="hidden" name="subscription_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="plan_id" value="3">

                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type='hidden' name="total"
                                                                value="{{ $item->price_3months }}">
                                                            <input type='hidden' name="productname"
                                                                value="Subscription 3 months">
                                                            <button class="btn btn-success" type="submit"
                                                                id="checkout-live-button">
                                                                <i class="fa fa-money"></i> Pay £
                                                                {{ $item->price_3months }}
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
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

                                        <td>
                                            <div class="cell-inner">
                                            </div>
                                            <div class="cell-btn-holder">
                                                <div class="gen-btn-container">
                                                    <div class="gen-button-block">

                                                        <input type="hidden" name="subscription_id"
                                                            value="{{ $item->id }}">
                                                        <input type="hidden" name="plan_id" value="5">

                                                        <input type="hidden" name="_token"
                                                            value="{{ csrf_token() }}">
                                                        <input type='hidden' name="total"
                                                            value="{{ $item->price_6months }}">
                                                        <input type='hidden' name="productname"
                                                            value="Subscription 6 months">
                                                        <button class="btn btn-success" type="submit"
                                                            id="checkout-live-button">
                                                            <i class="fa fa-money"></i> Pay £
                                                            {{ $item->price_6months }}
                                                        </button>
                                                        </form>


                                                    </div>
                                                </div>
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

                                        <td>
                                            <div class="cell-inner">
                                            </div>
                                            <div class="cell-btn-holder">
                                                <div class="gen-btn-container">
                                                    <div class="gen-button-block">

                                                        <form action="{{ route('session') }}" method="POST">
                                                            <input type="hidden" name="subscription_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="plan_id" value="5">

                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type='hidden' name="total"
                                                                value="{{ $item->pricing_per_yr }}">
                                                            <input type='hidden' name="productname"
                                                                value="Subscription per year">
                                                            <button class="btn btn-success" type="submit"
                                                                id="checkout-live-button">
                                                                <i class="fa fa-money"></i> Pay £
                                                                {{ $item->pricing_per_yr }}
                                                            </button>
                                                        </form>

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
