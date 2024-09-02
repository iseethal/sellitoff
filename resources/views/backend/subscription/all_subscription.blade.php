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
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('subscription.all') }}">All Subscriptions</a> </li>
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
                                            <th>User Type</th>
                                            <th>User Category Type</th>
                                            <th>Plan Name</th>
                                            <th>Photo Count</th>
                                            <th>Pricing Per Week</th>
                                            <th>Pricing Per Month</th>
                                            <th>Pricing 3 Month</th>
                                            <th>Pricing 6 Month</th>
                                            <th>Pricing per year</th>
                                            <th>Items</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($categories as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>


                                                @php

                                                    $user_type_is = $style = '';
                                                    if ($item->user_type == 1) {
                                                        $user_type_is = 'Individual';
                                                    } elseif ($item->user_type == 2) {
                                                        $user_type_is = 'Bussiness price';
                                                    }

                                                @endphp


                                                <td>{{ $user_type_is }}</td>

                                                @php

                                                    $user_type_category_is = $style = '';
                                                    if ($item->user_type_category == 1) {
                                                        $user_type_category_is = 'General items';
                                                    } elseif ($item->user_type_category == 2) {
                                                        $user_type_category_is = 'car';
                                                    }
                                                    elseif ($item->user_type_category == 3) {
                                                        $user_type_category_is = 'Rental Property';
                                                    }
                                                    elseif ($item->user_type_category == 4) {
                                                        $user_type_category_is = 'Sale Property';
                                                    }
                                                     else {
                                                        $user_type_category_is = 'Property';
                                                    }

                                                @endphp

                                                <td>{{ $user_type_category_is }}</td>
                                                <td>{{ $item->plan_name }}</td>
                                                <td>{{ $item->photo_count }}</td>
                                                <td>£ {{ $item->pricing_per_week }}</td>
                                                <td>£ {{ $item->pricing_per_month }}</td>
                                                <td>£ {{ $item->price_3months }}</td>
                                                <td>£ {{ $item->price_6months }}</td>
                                                <td>£ {{ $item->pricing_per_yr }}</td>



                                                <td>{{ $item->items }}</td>


                                                @php

                                                    $status_is = $style = '';
                                                    if ($item->is_active == 1) {
                                                        $status_is = 'Active';
                                                        $style = 'style=color:green;';
                                                    } else {
                                                        $status_is = 'InActive';
                                                        $style = 'style=color:red;';
                                                    }

                                                @endphp

                                                <td {{ $style }}>{{ $status_is }}</td>

                                                <td>
                                                    <a href="{{ route('subscription.edit', ['id' => $item['id']]) }}"><i
                                                            class="fa fa-edit" style="color: green;"></i></a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="{{ route('subscription.delete', $item->id) }}"> <i
                                                            class="fa fa-remove" style="color: green;"></i></a>
                                                </td>

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
