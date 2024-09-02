@include('backend.templates.header')


<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">


            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5"> Subscriptions</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ route('subscription.all') }}">All Subscriptions</a> </li>
                    </ol>
                </div>

                <a href="{{ route('subscription.add') }}">
                    <button class="btn ripple btn-main-primary" style="background-color: #25233c;"><i
                            class="fe fe-plus mr-2"></i>Add New</button>
                </a>
            </div>
            <!-- End Page Header -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card custom-card overflow-hidden">
                        <div class="card-body">

                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> {{ session::get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div>
                            </div>
                            <div class="table-responsive">
                                <table id="exportexample"
                                    class="table table-bordered border-t0 key-buttons text-nowrap w-100">

                                    <thead>

                                        <tr>

                                            <th>Id</th>
                                            <th>User Id</th>
                                            <th>Subscription Plan name</th>
                                            <th>Subscription Usertype category</th>
                                            <th>User Type</th>
                                            <th>Photo Count</th>
                                            <th>Duration Type</th>
                                            <th>Price</th>
                                            <th>Duration Start Date</th>
                                            <th>Duration End Date</th>

                                        </tr>

                                    </thead>
                                    <tbody>

                                        @foreach ($usersubscription as $value)
                                            <tr>

                                                <td>{{ $value->id }}</td>

                                                @php
                                                    
                                                    $username = App\Models\User::where('id', $value->user_id)
                                                        ->select('name')
                                                        ->get();
                                                    
                                                    foreach ($username as $name) {
                                                        $user_id = $value->user_id;
                                                        $user_name = $name->name;
                                                        $user_nameARR[$user_id] = $user_name;
                                                    }
                                                    
                                                @endphp

                                                <td>{{ $user_nameARR[$value->user_id] }}</td>

                                                @php
                                                    
                                                    $subscription = App\Models\Subscription::where('id', $value->subscription_id)
                                                        ->select('plan_name')
                                                        ->get();
                                                    
                                                    foreach ($subscription as $item) {
                                                        $subscription_id = $value->subscription_id;
                                                        $plan_name = $item->plan_name;
                                                        $plan_name = $item->plan_name;
                                                        $subscriptionplan_name_nameARR[$subscription_id] = $plan_name; //jacqu
                                                    }
                                                    
                                                @endphp

                                                <td> {{ $subscriptionplan_name_nameARR[$value->subscription_id] }} </td>

                                                @php
                                                    
                                                    $subscription_user_type_category = App\Models\Subscription::where('id', $value->subscription_id)
                                                        ->select('user_type_category')
                                                        ->get();
                                                    
                                                    foreach ($subscription_user_type_category as $item) {
                                                        $subscription_id = $value->user_type_category;
                                                        $user_type_category = $item->user_type_category;
                                                    
                                                        $subscription_user_type_category_nameARR[$subscription_id] = $user_type_category; //jacquu
                                                    }
                                                    
                                                @endphp

                                                @php
                                                    
                                                    if ($subscription_user_type_category_nameARR[$value->user_type_category] == 1) {
                                                        $user_type_category_is = 'General items';
                                                    } elseif ($subscription_user_type_category_nameARR[$value->user_type_category] == 2) {
                                                        $user_type_category_is = 'car';
                                                    } elseif ($subscription_user_type_category_nameARR[$value->user_type_category] == 3) {
                                                        $user_type_category_is = 'Rental Property';
                                                    } elseif ($subscription_user_type_category_category_nameARR[$value->user_type_category] == 4) {
                                                        $user_type_category_is = 'Sale Property';
                                                    } else {
                                                        $user_type_category_is = 'Property';
                                                    }
                                                    
                                                @endphp


                                                <td> {{ $user_type_category_is }} </td>


                                                @php
                                                    
                                                    $subscription_user_type = App\Models\Subscription::where('id', $value->subscription_id)
                                                        ->select('user_type')
                                                        ->get();
                                                    
                                                    foreach ($subscription_user_type as $item) {
                                                        $subscription_id = $value->subscription_id;
                                                        $user_type = $item->user_type;
                                                    
                                                        $subscription_user_type_nameARR[$subscription_id] = $user_type; //jacquu
                                                    }
                                                    
                                                @endphp

                                                @php
                                                    
                                                    if ($subscription_user_type_nameARR[$value->subscription_id] == 1) {
                                                        $user_type_is = 'Individual';
                                                    } elseif ($subscription_user_type_nameARR[$value->subscription_id] == 2) {
                                                        $user_type_is = 'Bussines price';
                                                    }
                                                    
                                                @endphp

                                                <td> {{ $user_type_is }}</td>




                                                @php
                                                    
                                                    $subscription_photo_count = App\Models\Subscription::where('id', $value->subscription_id)
                                                        ->select('photo_count')
                                                        ->get();
                                                    
                                                @endphp

                                                @foreach ( $subscription_photo_count as $item)

                                                @php
                                                    $photo_count = $item->photo_count;
                                                @endphp
                                                    
                                                @endforeach

                                                <td>{{ $photo_count }}</td>




                                                @php
                                                    
                                                    if ($value->duration_id == 1) {
                                                        $duration_id_is = 'week';
                                                    } elseif ($value->duration_id == 2) {
                                                        $duration_id_is = 'month';
                                                    } elseif ($value->duration_id == 3) {
                                                        $duration_id_is = '3month';
                                                    } elseif ($value->duration_id == 4) {
                                                        $duration_id_is = '6month';
                                                    } elseif ($value->duration_id == 5) {
                                                        $duration_id_is = 'year';
                                                    }
                                                    
                                                @endphp



                                                <td> {{ $duration_id_is }}</td>





                                                @php
                                                    
                                                    $subscription_price_year = App\Models\Subscription::where('id', $value->subscription_id)
                                                        ->select('pricing_per_yr')
                                                        ->get();
                                                    
                                                @endphp

                                                @foreach ($subscription_price_year as $item)
                                                    @php
                                                        
                                                        $subscription_price_yr = $item->pricing_per_yr;
                                                        
                                                    @endphp
                                                @endforeach

                                                @if ($value->duration_id == 5)
                                                    <td>{{ $subscription_price_yr }}</td>
                                                @endif


                                                @php
                                                    
                                                    $subscription_price_6months = App\Models\Subscription::where('id', $value->subscription_id)
                                                        ->select('price_6months')
                                                        ->get();
                                                    
                                                @endphp

                                                @foreach ($subscription_price_6months as $item)
                                                    @php
                                                        
                                                        $subscription_price_6month = $item->price_6months;
                                                        
                                                    @endphp
                                                @endforeach

                                                @if ($value->duration_id == 4)
                                                    <td>{{ $subscription_price_6month }}</td>
                                                @endif

                                                @php
                                                    
                                                    $subscription_price_week = App\Models\Subscription::where('id', $value->subscription_id)
                                                        ->select('pricing_per_week')
                                                        ->get();
                                                    
                                                @endphp

                                                @foreach ($subscription_price_week as $item)
                                                    @php
                                                        
                                                        $subscription_price_wk = $item->pricing_per_week;
                                                        
                                                    @endphp
                                                @endforeach

                                                @if ($value->duration_id == 1)
                                                    <td>{{ $subscription_price_wk }}</td>
                                                @endif


                                                @php
                                                    
                                                    $subscription_price_per_months = App\Models\Subscription::where('id', $value->subscription_id)
                                                        ->select('pricing_per_month')
                                                        ->get();
                                                    
                                                @endphp

                                                @foreach ($subscription_price_per_months as $item)
                                                    @php
                                                        
                                                        $subscription_price_per_month = $item->pricing_per_month;
                                                        
                                                    @endphp
                                                @endforeach

                                                @if ($value->duration_id == 2)
                                                    <td>{{ $subscription_price_per_month }}</td>
                                                @endif



                                                @php
                                                    
                                                    $subscription_price_3months = App\Models\Subscription::where('id', $value->subscription_id)
                                                        ->select('price_3months')
                                                        ->get();
                                                    
                                                @endphp

                                                @foreach ($subscription_price_3months as $item)
                                                    @php
                                                        
                                                        $subscription_price_3month = $item->price_3months;
                                                        
                                                    @endphp
                                                @endforeach

                                                @if ($value->duration_id == 3)
                                                    <td>{{ $subscription_price_3month }}</td>
                                                @endif

                                                <td>{{ $value->start_date }}</td>
                                                <td>{{ $value->end_date }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>
<!-- End Main Content-->



@include('backend.templates.footer')
