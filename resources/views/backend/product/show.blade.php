<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="col-md-4">
        <label class="mg-b-0">Category</label>
    </div>
    <div class="col-md-8 mg-t-5 mg-md-t-0">
        <select class="form-control select select2" name="category_id"
            id="category_id" required>
            @foreach ($category as $item)
                <option value="">choose one</option>
                <option value="{{ $item->id }}">{{ $item->category_name }}
                </option>
            @endforeach
        </select>
    </div>
</div>


<div class="row row-xs align-items-center mg-b-20" id="subcategory_id">
    <div class="col-md-4">
        <label class="mg-b-0">Subcategory</label>
    </div>

    <div class="col-md-8 mg-t-5 mg-md-t-0">
        <select class="subcategory_id form-control select select2"
            name="subcategory_id">
        </select>
    </div>
</div>


</body>
</html



<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var categoryID = $(this).val();
            alert("hii");

            if (categoryID) {
                $.ajax({

                    url: '/loadsubcategory/' + categoryID,
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
