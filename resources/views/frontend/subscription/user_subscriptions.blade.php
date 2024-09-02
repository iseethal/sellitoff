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
            font-size: 16px !important;
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
                                USER SUBSCRIPTIONS
                            </h2>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active"> Subscriptions</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->


    @if (!$user_subscriptions->isEmpty())

        <section class="position-relative pb-0">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="color:#ff9900;">CATEGORY</th>
                                        <th style="color:#ff9900; ">PLAN </th>
                                        <th style="color:#ff9900;">DURATION</th>
                                        <th style="color:#ff9900; ">START DATE</th>
                                        <th style="color:#ff9900; ">END DATE</th>
                                        <th style="color:#ff9900; ">PRODUCTS</th>
                                        <th style="color:#ff9900; ">ACTION</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_subscriptions as $item)
                                        @php
                                            $plan_name = App\Models\Subscription::where('id', $item->subscription_id)
                                                ->pluck('plan_name')
                                                ->first();
                                            $category = App\Models\Category::where('id', $item->main_category_id)
                                                ->pluck('category_name')
                                                ->first();

                                            if ($item->duration_id == 1) {
                                                $duration = 'Week';
                                            } elseif ($item->duration_id == 2) {
                                                $duration = 'Month';
                                            } elseif ($item->duration_id == 3) {
                                                $duration = '3 Months';
                                            } elseif ($item->duration_id == 4) {
                                                $duration = '6 Months';
                                            } else {
                                                $duration = 'Year';
                                            }
                                            $category_id = $item->main_category_id;

                                            if ($item->main_category_id == 1) {
                                                $main_category = 'General';
                                            } elseif ($item->main_category_id == 2) {
                                                $main_category = 'Car';
                                            } elseif ($item->main_category_id == 3) {
                                                $main_category = 'Rental Property';
                                            } elseif ($item->main_category_id == 4) {
                                                $main_category = 'Sale Property';
                                            } else {
                                                $main_category = 'Property';
                                            }
                                            $user = Auth::user();
                                            $user_plan_type = $user->user_plan_type;
                                            $products = App\Models\Product::where('subscription_id', $item->id)
                                                ->select('product_name')
                                                ->where('is_active',1)
                                                ->get();
                                                // dd($products->toArray());

                                            $mcid = $item->main_category_id;

                                            $today      = Illuminate\Support\Carbon::now();
                                            $end_date   = $item->end_date;
                                            $carbonDate =  Illuminate\Support\Carbon::parse($end_date);
                                            $yesterday  = $carbonDate->subDay();

                                            $datetime1  = strtotime($today);
                                            $datetime2  = strtotime($yesterday);
                                            $days       = (int) (($datetime1 - $datetime2) / 86400);

                                        @endphp

                                        <tr>
                                            <th scope="row" style="color:white; ">{{ $plan_name }}  </th>
                                            <th scope="row" style="color:white; ">{{ $main_category }} </th>
                                            <td style="color:white; ">{{ $duration }}</td>
                                            <td style="color:white; ">{{ $item->start_date }}</td>
                                            <td style="color:white; ">{{ $item->end_date }}</td>
                                            <td style="color:white; ">
                                                @php $i = 0; $user_subscription_id = $item->id; @endphp
                                                @foreach ($products as $item)
                                                    {{ $item->product_name }} &nbsp; &nbsp;
                                                    @php $i++; @endphp
                                                    @if ($i == 5)
                                                        <br>
                                                    @endif
                                                @endforeach
                                            </td>

                                            @if ($user_plan_type == 1)
                                                @if ($days >= 1)

                                                @php $individual_subscription_id = $user_subscription_id.'_'.$user_plan_type;   @endphp
                                                    <td> <a href="{{ route('user_subscriptions.renew', ['id' =>$individual_subscription_id]) }}"><b style="color: #2ea113">RENEW</b></a> </td>
                                                @else
                                                    <td><b style="color: rgb(177, 232, 165)">RENEW</b></td>
                                                @endif

                                            @else
                                                 @if ($days >= 1)
                                                     <td> <a href="{{ route('user_subscriptions.renew', ['id' =>$user_subscription_id]) }}"><b style="color: #2ea113">RENEW</b></a> </td>
                                                @else
                                                    <td><b style="color: rgb(177, 232, 165)">RENEW</b></td>
                                                @endif
                                            @endif


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br><br>
    @endif



    @include('frontend.templates.footer')
