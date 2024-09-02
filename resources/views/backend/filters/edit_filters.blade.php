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
            <h2 class="main-content-title tx-24 mg-b-5">Filter</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('filter.all')}}">Filter</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Filter</li>
            </ol>
        </div>

    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row row-sm">

        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">

                    <form action="{{ route('filter.update', [ 'id'=> $filter->id ]) }}"  method="POST" enctype="multipart/form-data" >

                    @csrf

                    <div class="">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Country</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="country" id="country">
                                    <option value="0"  @if($filter->country =='0') selected='selected' @endif>choose one</option>
                                    <option value="1"  @if($filter->country =='1') selected='selected' @endif>England</option>
                                    <option value="2"  @if($filter->country =='2') selected='selected' @endif>Wales</option>
                                    <option value="3"  @if($filter->country =='3') selected='selected' @endif>Scotland</option>
                                    <option value="4"  @if($filter->country =='4') selected='selected' @endif>Northern Ireland</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Region</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="region" id="region" placeholder="Enter region name" type="text" value="{{$filter->region}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">County</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="county" id="county" placeholder="Enter county name" type="text" value="{{$filter->county}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Place</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="place" id="place" placeholder="Enter Place" type="text" value="{{$filter->place}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Condition</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="condition" id="condition">
                                    <option value="0"  @if($filter->condition  =='0') selected='selected' @endif>choose one</option>
                                    <option value="1" @if($filter->condition   =='1') selected='selected' @endif>New</option>
                                    <option value="2" @if($filter->condition   =='2') selected='selected' @endif>Used</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Body Type</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="body_type" id="body_type">
                                    <option value="0" @if($filter->body_type   =='0') selected='selected' @endif>choose one</option>
                                    <option value="1" @if($filter->body_type   == '1') selected='selected' @endif>Hatchback</option>
                                    <option value="2" @if($filter->body_type   == '2') selected='selected' @endif>Estate</option>
                                    <option value="3" @if($filter->body_type   == '3') selected='selected' @endif>SUV</option>
                                    <option value="4" @if($filter->body_type   == '4') selected='selected' @endif>Saloon</option>
                                    <option value="5" @if($filter->body_type   == '5') selected='selected' @endif>Coupe</option>
                                    <option value="6" @if($filter->body_type   == '6') selected='selected' @endif>Convertible</option>
                                    <option value="7" @if($filter->body_type   == '7') selected='selected' @endif>MPV</option>
                                    <option value="8" @if($filter->body_type   == '8') selected='selected' @endif>Pickup</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Size (or weight)</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="size" id="size" placeholder="Enter size or weight" type="text" value="{{$filter->size}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Make</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="make" id="make" placeholder="Enter make" type="text" value="{{$filter->make}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Model</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="model" id="model" placeholder="Enter model" type="text" value="{{$filter->model}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Model Variant</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="model_variant" id="model_variant" placeholder="Enter model variant" type="text" value="{{$filter->model_variant}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Price Range</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="price_range" id="price_range" placeholder="Enter price range" type="text" value="{{$filter->price_range}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Year Range</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="year_range" id="year_range" placeholder="Enter year range" type="text" value="{{$filter->year_range}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Engine Size Range</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="engine_size_range" id="engine_size_range" placeholder="Enter engine size range" type="text" value="{{$filter->engine_size_range}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Seat Range</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="seat_range" id="seat_range" placeholder="Enter seat range" type="text" value="{{$filter->seat_range}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Mileage</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="mileage" id="mileage">
                                    <option value="0" @if($filter->mileage   =='0') selected='selected' @endif>choose one</option>
                                    <option value="1" @if($filter->mileage   =='1') selected='selected' @endif>Up to 100 miles</option>
                                    <option value="2" @if($filter->mileage   =='2') selected='selected' @endif>Up to 500 miles</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Gearbox</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="gearbox" id="gearbox">
                                    <option value="0" @if($filter->gearbox   =='0') selected='selected' @endif>choose one</option>
                                    <option value="1" @if($filter->gearbox   =='1') selected='selected' @endif>Automatic</option>
                                    <option value="2" @if($filter->gearbox   =='2') selected='selected' @endif>Manual</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Fuel Type</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="fuel_type" id="fuel_type">
                                    <option value="0" @if($filter->fuel_type =='0') selected='selected' @endif>choose one</option>
                                    <option value="1" @if($filter->fuel_type =='1') selected='selected' @endif>Diesel</option>
                                    <option value="2" @if($filter->fuel_type =='2') selected='selected' @endif>Petrol</option>
                                    <option value="3" @if($filter->fuel_type =='3') selected='selected' @endif>Diesel Hybrid</option>
                                    <option value="4" @if($filter->fuel_type =='4') selected='selected' @endif>Petrol Hybrid</option>
                                    <option value="5" @if($filter->fuel_type =='5') selected='selected' @endif>Petrol Plug-In Hybrid</option>
                                    <option value="6" @if($filter->fuel_type =='6') selected='selected' @endif>Electric</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Doors</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="doors" id="doors">
                                    <option value="0" @if($filter->doors =='0') selected='selected' @endif>choose one</option>
                                    <option value="1" @if($filter->doors =='1') selected='selected' @endif>2 doors</option>
                                    <option value="2" @if($filter->doors =='2') selected='selected' @endif>3 doors</option>
                                    <option value="3" @if($filter->doors =='3') selected='selected' @endif>4 doors</option>
                                    <option value="4" @if($filter->doors =='4') selected='selected' @endif>5 doors</option>
                                    <option value="5" @if($filter->doors =='5') selected='selected' @endif>6 doors</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Color</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="color" id="color" placeholder="Enter color" type="text" value="{{$filter->color}}">
                            </div>
                        </div>





                        {{-- Residential Property for rent start --}}


                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Year Built</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="year_built" id="year_built" placeholder="Enter year built" type="text" value="{{$filter->year_built}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Type of Let</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="let_type" id="let_type">
                                    <option value="0" @if($filter->let_type =='0') selected='selected' @endif>choose one</option>
                                    <option value="1" @if($filter->let_type =='1') selected='selected' @endif>Short-Term</option>
                                    <option value="2" @if($filter->let_type =='2') selected='selected' @endif >Long-Term</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Property Type</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="property_type" id="property_type">
                                    <option value="0"  @if($filter->property_type == '0')   selected='selected' @endif>choose one</option>
                                    <option value="1"  @if($filter->property_type == '1')   selected='selected' @endif>Detached</option>
                                    <option value="2"  @if($filter->property_type == '2')   selected='selected' @endif>Semi-Detached</option>
                                    <option value="3"  @if($filter->property_type == '3')   selected='selected' @endif>Terraced</option>
                                    <option value="4"  @if($filter->property_type == '4')   selected='selected' @endif>Flat</option>
                                    <option value="5"  @if($filter->property_type == '5')   selected='selected' @endif>Bungalow</option>
                                    <option value="6"  @if($filter->property_type == '6')   selected='selected' @endif>Park Home</option>
                                    <option value="7"  @if($filter->property_type == '7')   selected='selected' @endif>Student Hall</option>
                                    <option value="8"  @if($filter->property_type == '8')   selected='selected' @endif>Land</option>
                                    <option value="9"  @if($filter->property_type == '9')   selected='selected' @endif>Office</option>
                                    <option value="10" @if($filter->property_type == '10')  selected='selected' @endif>Retail</option>
                                    <option value="11" @if($filter->property_type == '11')  selected='selected' @endif>Leisure/Hospitality</option>
                                    <option value="12" @if($filter->property_type == '12')  selected='selected' @endif>Industrial/Warehouse</option>
                                    <option value="13" @if($filter->property_type == '13')  selected='selected' @endif>Land/Development</option>
                                    <option value="14" @if($filter->property_type == '14')  selected='selected' @endif>Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Furnished Type</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <select class="form-control select select2" name="furnished_type" id="furnished_type">
                                    <option value="0"  @if($filter->furnished_type  == '0')   selected='selected' @endif>choose one</option>
                                    <option value="1"  @if($filter->furnished_type  == '1') selected='selected' @endif>Furnished</option>
                                    <option value="2"  @if($filter->furnished_type  == '2') selected='selected' @endif>Semi-Furnished</option>
                                    <option value="3"  @if($filter->furnished_type  == '3') selected='selected' @endif>Unfurnished</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Toilet Range</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="toilet_range" id="toilet_range" placeholder="Enter toilet range" type="text" value="{{$filter->toilet_range}}">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Sqft range</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="sqft_range" id="sqft_range" placeholder="Enter Sqft range" type="text" value="{{$filter->sqft_range}}">
                            </div>
                        </div>

                       {{-- Residential Property for rent end --}}


                       {{-- Residential Property for sale start --}}

                       <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="mg-b-0">Type of ownership</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <select class="form-control select select2" name="ownership_type" id="ownership_type">
                                <option value="0"  @if($filter->ownership_type == '0')    selected='selected' @endif>choose one</option>
                                <option value="1"  @if($filter->ownership_type  == '1')   selected='selected' @endif>Independent</option>
                                <option value="2"  @if($filter->ownership_type  == '2')   selected='selected' @endif>Shared</option>
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
                            <input class="form-control" name="brand" id="brand" placeholder="Enter Brand Name" type="text" value="{{$filter->brand}}">
                        </div>
                      </div>

                      <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="mg-b-0">Year of purchase</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="year_purchase" id="year_purchase" placeholder="Enter Year of purchase" type="text" value="{{$filter->year_purchase}}">
                        </div>
                      </div>

                      <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="mg-b-0">Capacity</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" name="capacity" id="capacity" placeholder="Enter Capacity" type="text" value="{{$filter->capacity}}">
                        </div>
                      </div>



                        {{-- electronics end --}}

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Status</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <select class="form-control select select2" name="is_active" id="is_active" required>
                                <option value="1"  @if($filter->is_active =='1') selected='selected' @endif>Active</option>
                                <option value="0"  @if($filter->is_active =='0') selected='selected' @endif>InActive</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-8 pl-md-2">
                                <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5" style="background-color:#25233c;">Submit</button>
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
