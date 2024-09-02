<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;

class CategorysController extends Controller
{
    public function Allcategory() {

        $category = Category::where('is_deleted','<>',1)->get(); 
        // dd($subcategory->toArray());
        return view('frontend.categorys',compact('category'));
    }

    public function Getsubcategorys($id) 
    {

        if (request()->ajax()) {

            $cat = '';
            $subcat = '';
            $ss = '';

            $id = request()->all();
            $subcategorys  = Subcategory::where('is_deleted', '<>', 1)->where('category_id', $id['id'])->select('subcategory_name','id','category_id')->get();
          
           
            $category      =  Category::where('id', $id['id'])->select('category_name','id')->get();
            
           if($subcategorys->isEmpty() ) {
            foreach ($category as $item) {
              
            $cat .= "

            <label><h6 style='color:black'>category</h6> </label></br>
            <li><a href='/categoryallproducts?id=$item->id'><b>$item->category_name</b></a></li>
            ";
                }
            }

            foreach ($subcategorys as $item) {
               
                $subcat .= " 
                <li><b><a href='/subcategoryallproducts?id=$item->id'>$item->subcategory_name</b></a></li>  
                ";
                $subofsubcategorys  = Subsubcategory::where('is_deleted', '<>', 1)->where('category_id', $id['id'])->where('subcategory_id',$item->id)->select('sub_subcategory_name','id')->get();

                foreach ($subofsubcategorys as $value) {
                    $ss .= " 
                    <li style='color:green;'><b><a href='/sub_subcategorys?id=$item->id' style='color:green;'>$value->sub_subcategory_name</a></b> </li> 
                    ";
                }
                $total = "";
                $total = $subcat .= $ss ;
   
            }

            $out = '<div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" style="color:black !important" class="close"
                        data-dismiss="modal">&times;</button>
                </div>


                <div class="modal-body">

                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Document</title>
                    </head>

                    <body>

                    

                    <ul style="color:blue;list-style-type: none;">

                    ' . $cat . ' 

                    </ul>

                    <ul style="color:black;list-style-type:square;">';

                    $out .='<ul style="color:black;">';

                    foreach ($subcategorys as $item) {
                         
                        $out .='<li><b><a href="/subcategoryallproducts?id='; $out .=$item->id; $out .='">'; $out .=$item->subcategory_name; $out .='</b></a></li>';  
                        
                        $subofsubcategorys  = Subsubcategory::where('is_deleted', '<>', 1)->where('category_id', $id['id'])->where('subcategory_id',$item->id)->select('sub_subcategory_name','id')->get();
        
                        foreach ($subofsubcategorys as $value) {
                            $out .='<li style="color:black;"><b><a href="/subofsubcategoryallproducts?id='; $out .=$value->id; $out.='" style="color:black;">'; $out .=$value->sub_subcategory_name; $out .='</a></b> </li>';  
                        }       
                    }
                   
                    $out .='</ul>

                    </body>

                    </html>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        
    </div>';

            // return response()->json(['subcategory' => $subcategory ]);
            // return response()->json(['category' => $category]);

            return response()->json($out);
        }
    }
}
