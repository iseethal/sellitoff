@include('backend.templates.header')


<!-- Main Content-->
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5"> Sliders</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('slider.all') }}">All
                                Sliders</a> </li>
                    </ol>
                </div>

                <a href="{{ route('slider.add') }}">
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

                            <div class="table-responsive">
                                <table id="exportexample"
                                    class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Title </th>
                                            <th>Category Name</th>
                                            <th>Subtitle</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($sliders as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td><img src="{{ asset('backend/image/slider/' . $item->image) }}"
                                                        style="height:60px;width:100px;" /></td>
                                                <td>{{ $item->title }}</td>

                                                @php
                                                    
                                                    $categoryname = App\Models\Category::where('id', $item->category_id)
                                                        ->select('category_name')
                                                        ->get();
                                                    
                                                    $cat_nameARR = [];
                                                    
                                                    foreach ($categoryname as $value) {

                                                        $catid = $item->category_id;
                                                        $catname = $value->category_name;
                                                        $cat_nameARR[$catid] = $catname;
                                                    }
                                                    
                                                @endphp

                                                @if ($item->category_id != 0)
                                                    <td> {{ $cat_nameARR[$item->category_id] }}</td>
                                                @else
                                                    <td></td>
                                                @endif

                                                <td>{{ $item->subtitle }}</td>
                                                <td>{{ $item->description }}</td>

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
                                                    <a href="{{ route('slider.edit', ['id' => $item['id']]) }}"><i
                                                            class="fa fa-edit" style="color: green;"></i></a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="{{ route('slider.delete', $item->id) }}"> <i
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
