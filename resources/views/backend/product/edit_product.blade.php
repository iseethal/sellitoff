@include('backend.templates.header')

<!-- InternalFileupload css-->
<link href="{{ asset('backend/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

<style>
    .form input:checked+label:after, form input:checked+label:after {
        border-color:none;
        border-style:none; 
    }
       /* Increase the size of the checkbox */
       .checkbox {
            width: 18px !important;
            height: 18px !important;
        }
</style>

<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Products</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('product.all') }}"> Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Subcategory</li>
                    </ol>
                </div>

            </div>
            <!-- End Page Header -->

            <!-- Row -->
            <div class="row row-sm">

                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">

                            <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0">Category</label>
                                    </div>

                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <select class="form-control select select2" name="category_id" id="category_id"
                                            required>

                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($item->id == $product->category_id) selected @endif>
                                                    {{ $item->category_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mg-b-20" id="subcategory_id">
                                    <div class="col-md-4">
                                        <label class="mg-b-0">Subcategory</label>
                                    </div>

                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <select class="subcategory_id form-control select select2" name="subcategory_id">
                                            @foreach ($subcategory as $item)
                                                <option value="{{ $item->id }}" @if ($item->id == $product->subcategory_id) selected @endif>{{ $item->subcategory_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row row-xs align-items-center mg-b-20" id="sub_subcategory_id">
                                    <div class="col-md-4">
                                        <label class="mg-b-0">sub of Subcategory</label>
                                    </div>

                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <select class="sub_subcategory_id form-control select select2" name="sub_subcategory_id">
                                            @foreach ($sub_subcategory as $item)
                                            
                                                <option value="{{ $item->id }}" @if ($item->id == $product->sub_subcategory_id) selected @endif>{{ $item->sub_subcategory_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="">


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Product Name</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="product_name" id="product_name" value="{{ $product->product_name }}"
                                                placeholder="Enter product name" type="text" required>
                                        </div>
                                    </div>



                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Product Price</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="price" id="price" value="{{ $product->price }}"
                                                placeholder="Enter price" type="text" required>
                                        </div>
                                    </div>


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Description</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                <textarea id="description" class="form-control" name="description" rows="4" cols="50">
                                                    {{ $product->description }}
                                                </textarea>

                                        </div>
                                    </div>
        

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Image</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input type="file" name="image" id="image" class="dropify"
                                                data-default-file="{{ asset('backend/image/product/'.$product->image) }}"
                                                data-height="200"
                                                accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                                        </div>
                                    </div>


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Support Images</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="file" name="support_image1" id="support_image1" class="dropify" data-default-file="{{ asset('backend/image/product/'.$product->support_image1) }}" data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="file" name="support_image2" id="support_image2" class="dropify" data-default-file="{{ asset('backend/image/product/'.$product->support_image2) }}" data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
            
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="file" name="support_image3" id="support_image3" class="dropify" data-default-file="{{ asset('backend/image/product/'.$product->support_image3) }}" data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
            
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="file" name="support_image4" id="support_image4" class="dropify" data-default-file="{{ asset('backend/image/product/'.$product->support_image4) }}" data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
            
                                        </div>
            
                                    </div>


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"></label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">

                                            <input type="checkbox" class="mt-3 checkbox" value="1" {{ $product->highlight == 1 ? 'checked': '' }}
                                            name="highlight" >
                                            <label style="padding-right:40px;" >
                                            <span style="text-transform: capitalize;">Highlighted</span> </label>
                                            <br>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"></label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">

                                            <input type="checkbox" class="mt-3 checkbox" value="1" {{ $product->urgent == 1 ? 'checked': '' }}
                                            name="urgent">
                                            <label style="padding-right:40px;" >
                                            <span style="text-transform: capitalize;">urgent</span> </label>
                                            <br>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Status</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="is_active" id="is_active"
                                                required>
                                                <option value="1"
                                                    @if ($product->is_active == '1') selected='selected' @endif>Active
                                                </option>
                                                <option value="0"
                                                    @if ($product->is_active == '0') selected='selected' @endif>
                                                    InActive</option>
                                            </select>
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

                        if(data.length == 0){

                            $('#subcategory_id').hide();

                            $('#sub_subcategory_id').hide();
                            }
                            else{

                            $('#subcategory_id').show();

                            $('#sub_subcategory_id').show();

                        $('select[name="subcategory_id"]').empty();

                        $('.subcategory_id').html('<option value="0"> Select  Subcategory </option>');


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

                        if(data.length == 0){

                        $('#sub_subcategory_id').hide();
                        }
                        else{

                        $('#sub_subcategory_id').show();

                        $('select[name="sub_subcategory_id"]').empty();

                        $('.sub_subcategory_id').html('<option value="0"> Select Sub of Subcategory </option>');

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
