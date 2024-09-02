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
                    <h2 class="main-content-title tx-24 mg-b-5"> Sub-Subcategory</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('subsubcategory.all') }}">Sub-Subcategory</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Sub-Subcategory</li>
                    </ol>
                </div>

            </div>
            <!-- End Page Header -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">

                            <form action="{{ route('subsubcategory.update', ['id' => $sub_subcategory->id]) }}" method="POST"
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
                                                    @if ($item->id == $sub_subcategory->category_id) selected @endif>
                                                    {{ $item->category_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="">


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0">Subcategory</label>
                                        </div>

                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select class="form-control select select2" name="subcategory_id"
                                                id="subcategory_id">
                                                @foreach ($subcategory as $item)
                                                    <option value="{{ $item->id }}" @if ($item->id == $sub_subcategory->subcategory_id) selected @endif>{{ $item->subcategory_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Sub-Subcategory Name</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="sub_subcategory_name" value="{{ $sub_subcategory->sub_subcategory_name }}"
                                                id="sub_subcategory_name" placeholder="Enter sub-subcategory name"
                                                type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-4">
                                            <label class="mg-b-0"> Image</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input type="file" name="image" id="image" class="dropify"
                                                data-default-file="{{ asset('backend/image/subsubcategory/'.$sub_subcategory->image) }}"
                                                data-height="200"
                                                accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
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
                                                    @if ($sub_subcategory->is_active == '1') selected='selected' @endif>Active
                                                </option>
                                                <option value="0"
                                                    @if ($sub_subcategory->is_active == '0') selected='selected' @endif>
                                                    InActive</option>
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
                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' + value.id +'">' + value
                                .subcategory_name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="subcategory_id"]').empty();
            }
        });
    });
</script>

@include('backend.templates.footer')
