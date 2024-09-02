<?php

namespace App\Http\Controllers\frontend;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcategorysController extends Controller
{
    public function Allsubcategory() {

        $id = Request()->id;
        $subcategory = Subcategory::where('is_deleted','<>',1)->where('category_id',$id)->get(); 
        // dd($subcategory->toArray());
        return view('frontend.subcategorys',compact('subcategory'));
    }
}
