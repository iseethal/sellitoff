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
                    <h2 class="main-content-title tx-24 mg-b-5"> Subscriptions</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('subscription.all') }}">Subscriptions</a></li>
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

                            <form action="{{ route('subscription.store') }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                <div class="">

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">User Type</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="user_type" id="user_type"
                                                required>
                                                <option value="0">Choose one</option>
                                                <option value="1">Individual</option>
                                                <option value="2">Bussiness price</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">User Type Category</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="user_type_category" id="user_type_category"
                                                required>
                                                <option value="1">General items </option>
                                                <option value="2">Car</option>
                                                <option value="3">Rental Property</option>
                                                <option value="4">Sale Property</option>
                                                <option value="5">Property</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Plan Name</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="plan_name" id="plan_name"
                                                placeholder="Enter plan name" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Pricing per week</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="pricing_per_week" id="pricing_per_week"
                                                placeholder="Enter price per week " type="text" required>
                                        </div>
                                    </div>


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Pricing per month</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="pricing_per_month" id="pricing_per_month"
                                                placeholder="Enter price for 1 month " type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Pricing for 3 months</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="price_3months" id="price_3months"
                                                placeholder="Enter price for 3 months " type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Pricing for 6 months</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="price_6months" id="price_6months"
                                                placeholder="Enter price for 6 months " type="text">
                                        </div>

                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Pricing per year</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="pricing_per_yr" id="pricing_per_yr"
                                                placeholder="Enter price for an year" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Photo Count </label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="photo_count" id="photo_count "
                                                placeholder="Enter photo count " type="text" required>
                                        </div>
                                    </div>

                                    {{-- <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Duration</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="duration" id="duration"
                                                required>
                                                <option value="1">Pricing per week </option>
                                                <option value="2">Pricing per month </option>
                                                <option value="3">Pricing for 3 months </option>
                                                <option value="4">Pricing for 6 months </option>
                                                <option value="5">Pricing per year </option>
                                            </select>
                                        </div>
                                    </div> --}}





                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Items</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="items" id="items"
                                                placeholder="Enter items " type="text">
                                        </div>
                                    </div>





                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Status</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="is_active" id="is_active"
                                                required>
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
