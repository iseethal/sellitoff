@include('backend.templates.header')

<!-- InternalFileupload css-->
<link href="{{ asset('backend/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />


<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Filters</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('filter.all') }}">Filter</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New</li>
                    </ol>
                </div>

            </div>
            <!-- End Page Header -->

            <!-- Row -->
            <div class="row row-sm">

                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">

                            <form action="{{ route('filter.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <div class="">

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Country</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="country" id="country">
                                                <option value="0">Choose One</option>
                                                <option value="1">England</option>
                                                <option value="2">Wales</option>
                                                <option value="3">Scotland</option>
                                                <option value="4">Northern Ireland</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Region</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="region" id="region"
                                                placeholder="Enter region name" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">County</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="county" id="county"
                                                placeholder="Enter county name" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Place</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="place" id="place"
                                                placeholder="Enter Place" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Condition</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="condition" id="condition">
                                                <option value="0">Choose One</option>
                                                <option value="1">New</option>
                                                <option value="2">Used</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Body Type</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="body_type" id="body_type">
                                                <option value="0">Choose One</option>
                                                <option value="1">Hatchback</option>
                                                <option value="2">Estate</option>
                                                <option value="3">SUV</option>
                                                <option value="4">Saloon</option>
                                                <option value="5">Coupe</option>
                                                <option value="6">Convertible</option>
                                                <option value="7">MPV</option>
                                                <option value="8">Pickup</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Size (or weight)</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="size" id="size"
                                                placeholder="Enter size or weight" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Make</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="make" id="make"
                                                placeholder="Enter make" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Model</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="model" id="model"
                                                placeholder="Enter model" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Model Variant</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="model_variant" id="model_variant"
                                                placeholder="Enter model variant" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Price Range</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="price_range" id="price_range"
                                                placeholder="Enter price range" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Year Range</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="year_range" id="year_range"
                                                placeholder="Enter year range" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Engine Size Range</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="engine_size_range"
                                                id="engine_size_range" placeholder="Enter engine size range"
                                                type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Seat Range</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="seat_range" id="seat_range"
                                                placeholder="Enter seat range" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Mileage</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="mileage"
                                                id="mileage">
                                                <option value="0">Choose One</option>
                                                <option value="1">Up to 100 miles</option>
                                                <option value="2">Up to 500 miles</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Gearbox</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="gearbox"
                                                id="gearbox">
                                                <option value="0">Choose One</option>
                                                <option value="1">Automatic</option>
                                                <option value="2">Manual</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Fuel Type</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="fuel_type"
                                                id="fuel_type">
                                                <option value="0">Choose One</option>
                                                <option value="1">Diesel</option>
                                                <option value="2">Petrol</option>
                                                <option value="3">Diesel Hybrid</option>
                                                <option value="4">Petrol Hybrid</option>
                                                <option value="5">Petrol Plug-In Hybrid</option>
                                                <option value="6">Electric</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Doors</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="doors"
                                                id="doors">
                                                <option value="0">Choose One</option>
                                                <option value="1">2 doors</option>
                                                <option value="2">3 doors</option>
                                                <option value="3">4 doors</option>
                                                <option value="4">5 doors</option>
                                                <option value="5">6 doors</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Color</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="color" id="color"
                                                placeholder="Enter color" type="text">
                                        </div>
                                    </div>


                                    {{-- Residential Property for rent start --}}


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Year Built</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="year_built" id="year_built"
                                                placeholder="Enter year built" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Type of Let</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="let_type"
                                                id="let_type">
                                                <option value="0">Choose One</option>
                                                <option value="1">Short-Term</option>
                                                <option value="2">Long-Term</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Property Type</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="property_type"
                                                id="property_type">
                                                <option value="0">Choose One</option>
                                                <option value="1">Detached</option>
                                                <option value="2">Semi-Detached</option>
                                                <option value="3">Terraced</option>
                                                <option value="4">Flat</option>
                                                <option value="5">Bungalow</option>
                                                <option value="6">Park Home</option>
                                                <option value="7">Student Hall</option>
                                                <option value="8">Land</option>
                                                <option value="9">Office</option>
                                                <option value="10">Retail</option>
                                                <option value="11">Leisure/Hospitality</option>
                                                <option value="12">Industrial/Warehouse</option>
                                                <option value="13">Land/Development</option>
                                                <option value="14">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Furnished Type</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="furnished_type"
                                                id="furnished_type">
                                                <option value="0">Choose One</option>
                                                <option value="1">Furnished</option>
                                                <option value="2">Semi-Furnished</option>
                                                <option value="3">Unfurnished</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Toilet Range</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="toilet_range" id="toilet_range"
                                                placeholder="Enter toilet range" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Sqft range</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="sqft_range" id="sqft_range"
                                                placeholder="Enter Sqft range" type="text">
                                        </div>
                                    </div>

                                    {{-- Residential Property for rent end --}}


                                    {{-- Residential Property for sale start --}}

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Type of ownership</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="ownership_type"
                                                id="ownership_type">
                                                <option value="0">Choose One</option>
                                                <option value="1">Independent</option>
                                                <option value="2">Shared</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Residential Property for sale end --}}

                                    {{-- electronics start --}}


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Brand</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="brand" id="brand"
                                                placeholder="Enter Brand Name" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Year of purchase</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="year_purchase" id="year_purchase"
                                                placeholder="Enter Year of purchase" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Capacity</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="capacity" id="capacity"
                                                placeholder="Enter Capacity" type="text">
                                        </div>
                                    </div>

                                    {{-- electronics end --}}

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Status</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="is_active"
                                                id="is_active">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-end mb-0">
                                        <div class="col-md-8 pl-md-2">
                                            <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5"
                                                style="background-color:#25233c;">Submit</button>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
    </div>
</div>
<!-- End Main Content-->

<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Internal Fileuploads js-->
<script src="{{ asset('backend/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fileuploads/js/file-upload.js') }}"></script>

@include('backend.templates.footer')
