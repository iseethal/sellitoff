@include('backend.templates.header')

<!-- InternalFileupload css-->
<link href="{{ asset('backend/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

<style>
    .form input:checked+label:after,
    form input:checked+label:after {
        border-color: none;
        border-style: none;
    }
</style>

<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Products Filters</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('product.all') }}"> Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">product filters</li>
                    </ol>
                </div>

            </div>
            <!-- End Page Header -->

            <!-- Row -->
            <div class="row row-sm">

                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">

                            <form action="{{ route('product.filters.store', ['id' => $pid]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

								<div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0">Product</label>
                                    </div>
									<div class="col-md-4">
										<input type="hidden" id="pid" name="pid" value="{{ $pid }}">
                                        <label class="mg-b-0">{{ $product_name }}</label>
                                    </div>
								</div>

                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0">Category</label>
                                    </div>
									<div class="col-md-4">
                                        <label class="mg-b-0">{{ $cat_name }}</label>
                                    </div>
                                </div>

                                <div class="">

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Filters</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">

                                            @foreach ($category_filter as $value)
											
                                                @php
                                                    $filter_id 	  = $value->filter_id;
                                                    $filter_title = App\Models\Filter::get();
                                                    
                                                    foreach ($filter_title as $item) {

                                                        $filter_id 	 = $item->id;
                                                        $filter_name = $item->filter_title;
                                                        $filter_nameARR[$filter_id] = $filter_name;
                                                    }
                                                @endphp

                                                <div
                                                    style=" border: 1px solid #e8e8f7;padding-left:10px;padding-bottom:10px;margin-bottom:10px; z-index: -1;">

                                                    <label><b>{{ $filter_nameARR[$value->filter_id] }}</b></label>
                                                    <label style="padding-right:40px;">
                                                        <b  style="text-transform: capitalize;font-weight:bold;">{{ $value->filter_title }}</b></label><br>
                                                    @php
                                                        $filteroptions = App\Models\Filteroption::where('is_deleted', '<>', 1)
                                                            ->where('filter_id', $value->filter_id)
                                                            ->get();
                                                    @endphp

                                                    @if (!$filteroptions->isEmpty())
                                                        @foreach ($filteroptions as $item)
														
														@php
														$checked = "";
														if (count($option_idsARR)>0) {
															
															if (in_array($item->id , $option_idsARR)) {
																$checked = "checked";
															} else{
																$checked = "";
															}
														}
														@endphp
														
                                                            <input type="checkbox" class="ckbox mt-3" name="option_name[]" {{ $checked }}
                                                                value="{{ $item->id }}">
                                                            {{ $item->option_name }}
                                                        @endforeach
                                                    @endif
                                                    </span>

                                                </div>
                                            @endforeach


                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-end mb-0">
                                        <div class="col-md-8 pl-md-2">
                                            <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5"
                                                style="background-color:#25233c;">Submit</button>
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
<script src="{{ asset('backend/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fileuploads/js/file-upload.js') }}"></script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var categoryID = $(this).val();

            if (categoryID) {
                $.ajax({
                    url: '/getsubcategory/' + categoryID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        if (data.length == 0) {

                            $('#subcategory_id').hide();

                            $('#sub_subcategory_id').hide();
                        } else {

                            $('#subcategory_id').show();

                            $('#sub_subcategory_id').show();

                            $('select[name="subcategory_id"]').empty();

                            $('.subcategory_id').html(
                                '<option value="0"> Select  Subcategory </option>');


                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        }
                    }
                });
            } else {
                $('select[name="subcategory_id"]').empty();
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="subcategory_id"]').on('change', function() {
            var subcategoryID = $(this).val();


            if (subcategoryID) {
                $.ajax({
                    url: '/getsub_subcategory/' + subcategoryID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        if (data.length == 0) {

                            $('#sub_subcategory_id').hide();
                        } else {

                            $('#sub_subcategory_id').show();

                            $('select[name="sub_subcategory_id"]').empty();

                            $('.sub_subcategory_id').html(
                                '<option value="0"> Select Sub of Subcategory </option>'
                                );

                            $.each(data, function(key, value) {
                                $('select[name="sub_subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .sub_subcategory_name + '</option>');
                            });
                        }
                    }
                });
            } else {
                $('select[name="sub_subcategory_id"]').empty();
            }
        });
    });
</script>

@include('backend.templates.footer')
