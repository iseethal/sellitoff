@include('backend.templates.header')

<!-- InternalFileupload css-->
<link href="{{asset('backend/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />


<!-- Main Content-->
<div class="main-content side-content pt-0">
<div class="container-fluid">
<div class="inner-body">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> Subscriptions</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('subscription.all')}}"> Subscriptions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Subscription</li>
            </ol>
        </div>

    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row row-sm">

        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">

                    <form action="{{ route('subscription.update', [ 'id'=> $subscription->id ]) }}"  method="POST" enctype="multipart/form-data" >

                    @csrf



                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">User Type</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="user_type" id="user_type"
                                    required>
                                    <option value="0" @if($subscription->user_type  =='0') selected='selected' @endif>Choose one</option>
                                    <option value="1" @if($subscription->user_type  =='1') selected='selected' @endif>Individual</option>
                                    <option value="2" @if($subscription->user_type  =='2') selected='selected' @endif>Bussiness price</option>
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
                                    <option value="1" @if($subscription->user_type_category =='1') selected='selected' @endif>General items </option>
                                    <option value="2" @if($subscription->user_type_category =='2') selected='selected' @endif>Car</option>
                                    <option value="3" @if($subscription->user_type_category =='3') selected='selected' @endif>Rental Property</option>
                                    <option value="4" @if($subscription->user_type_category =='4') selected='selected' @endif>Sale Property</option>
                                    <option value="5" @if($subscription->user_type_category =='5') selected='selected' @endif>Property</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Plan Name</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="plan_name" value="{{ $subscription->plan_name }}" id="plan_name"
                                    placeholder="Enter plan name" type="text" required>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Pricing per week</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="pricing_per_week" id="pricing_per_week" value="{{ $subscription->pricing_per_week }}"
                                    placeholder="Enter price per week " type="text" required>
                            </div>
                        </div>


                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Pricing per month</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="pricing_per_month" id="pricing_per_month"  value="{{ $subscription->pricing_per_month }}"
                                    placeholder="Enter price for 1 month " type="text">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Pricing for 3 months</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="price_3months" id="price_3months"  value="{{ $subscription->price_3months }}"
                                    placeholder="Enter price for 3 months " type="text">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Pricing for 6 months</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="price_6months" id="price_6months" value="{{ $subscription->price_6months }}"
                                    placeholder="Enter price for 6 months " type="text">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Pricing per year</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="pricing_per_yr" id="pricing_per_yr" value="{{ $subscription->pricing_per_yr }}"
                                    placeholder="Enter price for an year" type="text">
                            </div>
                        </div>



                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Photo Count </label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="photo_count" id="photo_count" value="{{ $subscription->photo_count }}"
                                    placeholder="Enter photo count " type="text" required>
                            </div>
                        </div>



                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Items</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="items" id="items" value="{{ $subscription->items }}" type="text" >
                            </div>
                        </div>


                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Status</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <select class="form-control select select2" name="is_active" id="is_active" required>
                            <option value="1"  @if($subscription->is_active =='1') selected='selected' @endif>Active</option>
                                <option value="0" @if($subscription->is_active =='0') selected='selected' @endif>InActive</option>
                            </select>
                            </div>
                        </div>



                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-8 pl-md-2">
                                <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5" style="background-color:#25233c;">Submit</button>
                                <!-- <button class="btn ripple btn-secondary pd-x-30">Cancel</button> -->
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
<script src="{{asset('backend/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('backend/assets/plugins/fileuploads/js/file-upload.js')}}"></script>

@include('backend.templates.footer')
