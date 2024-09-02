@include('backend.templates.header')


<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">


            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5"> Filteration</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('filter.all') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> All Filters</li>
                    </ol>
                </div>

                <a href="{{ route('filter.add') }}">
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
                                            <th>Country</th>
                                            <th>Region</th>
                                            <th>County</th>
                                            <th>Place</th>

                                            <th>Condition</th>
                                            <th>Body Type</th>
                                            <th>Size</th>
                                            <th>Make</th>

                                            <th>Model</th>
                                            <th>Model Variant</th>
                                            <th>Price Range</th>
                                            <th>Year Range</th>
                                            <th>Engine Size Range</th>
                                            <th>Seat Range</th>
                                            <th>Mileage</th>
                                            <th>Gearbox</th>
                                            <th>Fuel Type</th>
                                            <th>Doors</th>
                                            <th>Color</th>
                                            <th>Year Built</th>
                                            <th>Type of Let</th>
                                            <th>Property Type</th>
                                            <th>Furnished Type</th>
                                            <th>Toilet Range</th>
                                            <th>Sqft range</th>
                                            <th>Type of ownership</th>
                                            <th>Brand</th>
                                            <th>Year of purchase</th>
                                            <th>Capacity</th>

                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($filter as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>

                                                @php
                                                    $country = '';
                                                    if ($item->country == 1) {
                                                        $country = 'England';
                                                    }
                                                    elseif ($item->country == 2) {
                                                        $country = 'Wales';
                                                    }
                                                    elseif ($item->country == 3) {
                                                        $country = 'Scotland';
                                                    }
                                                    elseif ($item->country == 4) {
                                                        $country = 'Northern Ireland';
                                                    }
                                                @endphp
                                                <td>{{ $country}}</td>

                                                <td>{{ $item->region }}</td>
                                                <td>{{ $item->county }}</td>
                                                <td>{{ $item->place }}</td>

                                                @php
                                                    $condition = '';
                                                    if ($item->condition == 1) {
                                                        $condition = 'New';
                                                    }
                                                    elseif ($item->condition == 2) {
                                                        $condition = 'Used';
                                                    }
                                                @endphp
                                                <td>{{ $condition }}</td>


                                                @php
                                                $body_type = '';
                                                if ($item->body_type == 1) {
                                                    $body_type = 'Hatchback';
                                                }
                                                elseif ($item->body_type == 2) {
                                                    $body_type = 'Estate';
                                                }
                                                elseif ($item->body_type == 3) {
                                                    $body_type = 'SUV';
                                                }
                                                elseif ($item->body_type == 4) {
                                                    $body_type = 'Saloon';
                                                }
                                                elseif ($item->body_type == 5) {
                                                    $body_type = 'Coupe';
                                                }
                                                elseif ($item->body_type == 6) {
                                                    $body_type = 'Convertible';
                                                }
                                                elseif ($item->body_type == 7) {
                                                    $body_type = 'MPV';
                                                }
                                                 elseif ($item->body_type == 8) {
                                                    $body_type = 'Pickup';
                                                }
                                                @endphp
                                                <td>{{ $body_type }}</td>

                                                <td>{{ $item->size }}</td>
                                                <td>{{ $item->make }}</td>
                                                <td>{{ $item->model }}</td>
                                                <td>{{ $item->model_variant }}</td>
                                                <td>{{ $item->price_range }}</td>
                                                <td>{{ $item->year_range }}</td>
                                                <td>{{ $item->engine_size_range }}</td>
                                                <td>{{ $item->seat_range }}</td>

                                                @php
                                                $mileage = '';
                                                if ($item->mileage == 1) {
                                                    $mileage = 'Up to 100 miles';
                                                }
                                                elseif ($item->mileage == 2) {
                                                    $mileage = 'Up to 500 miles';
                                                }
                                                @endphp
                                                <td>{{ $mileage }}</td>


                                                @php
                                                $gearbox = '';
                                                if ($item->gearbox == 1) {
                                                    $gearbox = 'Automatic';
                                                }
                                                 elseif ($item->gearbox == 2){
                                                    $gearbox = 'Manual';
                                                }
                                                @endphp
                                                <td>{{ $gearbox }}</td>


                                                @php
                                                    $fuel_type = '';
                                                    if ($item->fuel_type == 1) {
                                                        $fuel_type = 'Diesel';
                                                    }
                                                    elseif ($item->fuel_type == 2) {
                                                        $fuel_type = 'Petrol';
                                                    }
                                                    elseif ($item->fuel_type == 3) {
                                                        $fuel_type = 'Diesel Hybrid';
                                                    }
                                                    elseif ($item->fuel_type == 4) {
                                                        $fuel_type = 'Petrol Hybrid';
                                                    }
                                                    elseif ($item->fuel_type == 5) {
                                                        $fuel_type = 'Petrol Plug-In Hybrid';
                                                    }
                                                     elseif ($item->fuel_type == 6) {
                                                        $fuel_type = 'Electric';
                                                    }
                                                @endphp
                                                <td>{{ $fuel_type }}</td>

                                                @php
                                                $doors = '';
                                                if ($item->doors == 1) {
                                                    $doors = '2 Doors';
                                                }
                                                elseif ($item->doors == 2) {
                                                    $doors = '3 Doors';
                                                }
                                                elseif ($item->doors == 3) {
                                                    $doors = '4 Doors';
                                                }
                                                elseif ($item->doors == 4) {
                                                    $doors = '5 Doors';
                                                }
                                                 elseif ($item->doors == 5) {
                                                    $doors = '6 Doors';
                                                }
                                                @endphp
                                                <td>{{ $doors }}</td>

                                                <td>{{ $item->color }}</td>

                                                @php
                                                $year_built = '';
                                                if ($item->year_built != null) {
                                                    $year_built = $item->year_built;
                                                }
                                                 elseif ($item->year_built == 0){
                                                    $year_built = ' ';
                                                }
                                                @endphp
                                                <td>{{ $year_built }}</td>

                                                @php
                                                $let_type = '';
                                                if ($item->let_type == 1) {
                                                    $let_type = 'Short-Term';
                                                }
                                                 elseif ($item->let_type == 2) {
                                                    $let_type = 'Long-Term';
                                                }
                                                @endphp
                                                <td>{{ $let_type }}</td>


                                                @php
                                                $property_type = '';
                                                if ($item->property_type == 1) {
                                                    $property_type = 'Detached';
                                                }
                                                elseif ($item->property_type == 2) {
                                                    $property_type = 'Semi-Detached';
                                                }
                                                elseif ($item->property_type == 3) {
                                                    $property_type = 'Terraced';
                                                }
                                                elseif ($item->property_type == 4) {
                                                    $property_type = 'Flat';
                                                }
                                                elseif ($item->property_type == 5) {
                                                    $property_type = 'Bungalow';
                                                }
                                                elseif ($item->property_type == 6) {
                                                    $property_type = 'Park Home';
                                                }
                                                elseif ($item->property_type == 7) {
                                                    $property_type = 'Student Hall';
                                                }
                                                elseif ($item->property_type == 8) {
                                                    $property_type = 'Land';
                                                }
                                                elseif ($item->property_type == 9) {
                                                    $property_type = 'Office';
                                                }
                                                elseif ($item->property_type == 10) {
                                                    $property_type = 'Retail';
                                                }
                                                elseif ($item->property_type == 11) {
                                                    $property_type = 'Leisure/Hospitality';
                                                }
                                                elseif ($item->property_type == 12) {
                                                    $property_type = 'Industrial/Warehouse';
                                                }
                                                elseif ($item->property_type == 13) {
                                                    $property_type = 'Land/Development';
                                                }
                                                 elseif ($item->property_type == 14) {
                                                    $property_type = 'Other';
                                                }
                                                @endphp
                                                <td>{{ $property_type }}</td>

                                                @php
                                                $furnished_type = '';
                                                if ($item->furnished_type == 1) {
                                                    $furnished_type = 'Furnished';
                                                }
                                                elseif ($item->furnished_type == 2) {
                                                    $furnished_type = 'Semi-Furnished';
                                                }
                                                 elseif ($item->furnished_type == 3) {
                                                    $furnished_type = 'Unfurnished';
                                                }
                                                @endphp
                                                <td>{{ $furnished_type }}</td>

                                                <td>{{ $item->toilet_range }}</td>
                                                <td>{{ $item->sqft_range }}</td>

                                                @php
                                                $ownership_type = '';
                                                if ($item->ownership_type == 1) {
                                                    $ownership_type = 'Independent';
                                                }
                                                 elseif ($item->ownership_type == 2) {
                                                    $ownership_type = 'Shared';
                                                }
                                                @endphp
                                                <td>{{ $ownership_type }}</td>

                                                <td>{{ $item->brand }}</td>

                                                @php
                                                $year_purchase = '';
                                                if ($item->year_purchase != null) {
                                                    $year_purchase = $item->year_purchase;
                                                }
                                                 elseif ($item->year_purchase == 0){
                                                    $year_purchase = '';
                                                }
                                                @endphp
                                                <td>{{ $year_purchase }}</td>

                                                @php
                                                $capacity = '';
                                                if ($item->capacity != null) {
                                                    $capacity = $item->capacity;
                                                }
                                                 elseif ($item->capacity == 0){
                                                    $capacity = '';
                                                }
                                                @endphp
                                                <td>{{ $capacity }}</td>

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
                                                    <a href="{{ route('filter.edit', ['id' => $item['id']]) }}"><i
                                                            class="fa fa-edit" style="color: green;"></i></a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="{{ route('filter.delete', $item->id) }}"> <i
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
