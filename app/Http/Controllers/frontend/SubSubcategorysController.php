<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;

class SubSubcategorysController extends Controller
{
    public function AllSubsubcategory() {
        $id = Request()->id;
        $Subsubcategory = Subsubcategory::where('is_deleted','<>',1)->where('subcategory_id',$id)->get();

        return view('frontend.subsubcategorys',compact('Subsubcategory'));
    }
}
