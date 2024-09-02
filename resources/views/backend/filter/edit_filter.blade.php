@include('backend.templates.header')

<!-- InternalFileupload css-->
<link href="{{asset('backend/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Remove Textbox Dynamically using jQuery, PHP & Bootstrap</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style type="text/css">
.input-group {
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>

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
                                <label class="mg-b-0">Title</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="filter_title" id="filter_title" value="{{ $filter->filter_title }}"
                                    placeholder="Enter filter title" type="text" required>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Options</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                @foreach ($filteroptions as $item)
                                <div>
                                    <div class="input-group">
                                        <input type="text" name="option_name_{{ $item->id }}" value="{{ $item->option_name}}"
                                            class="form-control" />
                                        <span class="input-group-btn">
                                            <button type="button"
                                                class="btn btn-danger remove-textbox">
                                                <a href="{{ route('filter.filteroptiondelete',[ 'id'=> $item->id ]) }}"><i
                                                    class="glyphicon glyphicon-minus" style="color:white;"></i></a></button>
                                        </span>
                                    </div>
                                </div>
                                @endforeach

                                        <div class="textbox-wrapper">
                                            <div class="input-group">
                                                <input type="text" name="option_name[]" placeholder="Enter New Option"
                                                    class="form-control" />
                                                <span class="input-group-btn">
                                                    <button type="button"
                                                        class="btn btn-danger add-textbox"><i
                                                            class="glyphicon glyphicon-plus"></i></button>
                                                </span>
                                            </div>
                                        </div>
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
<script src="{{asset('backend/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('backend/assets/plugins/fileuploads/js/file-upload.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var max = 10;
        var cnt = 1;
        $(".add-textbox").on("click", function(e) {
            e.preventDefault();
            if (cnt < max) {
                cnt++;
                $(".textbox-wrapper").append(
                    '<div class="input-group"><input type="text" name="option_name[]" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-danger remove-textbox"><i class="glyphicon glyphicon-minus"></i></button></span></div>'
                    );
            }
        });

        $(".textbox-wrapper").on("click", ".remove-textbox", function(e) {
            e.preventDefault();
            $(this).parents(".input-group").remove();
            cnt--;
        });
    });
</script>

@include('backend.templates.footer')
