<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use App\Models\Category;

class SubSubcategoryController extends Controller
{
    public function AllSubSubCategory()
    {
        $sub_subcategories = Subsubcategory::where('is_deleted', '<>', 1)->get();
        return view('backend.subsubcategory.all_sub_subcategory', compact('sub_subcategories'));
    }

    public function GetSubCategory($id) {

        if (request()->ajax()) {

            $subcategory = Subcategory::where('category_id', $id)->get();

            return json_encode($subcategory);

            // return response()->json(['subcategory' => $subcategory ]);

        }

    }


    public function AddSubSubCategory()
    {
        $category = Category::where('is_deleted', '<>', 1)->get();
        // $subcategory = Subcategory::where('is_deleted', '<>', 1)->get();
        // return view('backend.subsubcategory.add_sub_subcategory', compact('category','subcategory'));
        return view('backend.subsubcategory.add_sub_subcategory', compact('category'));
    }

    public function StoreSubSubCategory(Request $request)
    {
        if ($request->file('image') != null) {
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/subsubcategory'), $filename);
            $path       = "public/backend/image/subsubcategory/$filename";
        } else {
            $filename   = "";
        }

        Subsubcategory::insert([
            'category_id'          => $request->category_id,
            'subcategory_id'       => $request->subcategory_id ?? 0,
            'sub_subcategory_name' => $request->sub_subcategory_name ?? 0,
            'image'                => $filename ?? "",
            'is_active'            => $request->is_active,
        ]);

        return redirect()->route('subsubcategory.all')->with('success', 'Subcategory added');
    }

    public function EditSubSubCategory(Request $request)
    {
        $id                = $request->id;
        $sub_subcategory   = Subsubcategory::findOrFail($id);
        $category_id       = $sub_subcategory->category_id;
        $category          = Category::where('is_deleted', '<>', 1)->get();
        $subcategory       = Subcategory::where('is_deleted', '<>', 1)->where('category_id',$category_id)->get();
        // $subcategory       = Subcategory::where('is_deleted', '<>', 1)->get();
        return view('backend.subsubcategory.edit_sub_subcategory', compact('sub_subcategory', 'category','subcategory'));
    }

    public function UpdateSubSubCategory(Request $request, $id)
    {
        $id        = $request->id;
        $subsubcategory  = Subsubcategory::findOrFail($id);
        if ($request->file('image') != null) {

            $imagePath = public_path('backend/image/subsubcategory/' . $subsubcategory->image);

            if ($subsubcategory->image != null) {
                unlink($imagePath);
            }

            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/subsubcategory'), $filename);
            $path       = "public/backend/image/subsubcategory/$filename";
        }

        $image  = Subsubcategory::where('id', $id)->pluck('image')->first();

        Subsubcategory::findOrFail($id)->update([

            'category_id'          => $request->category_id,
            'subcategory_id'       => $request->subcategory_id,
            'sub_subcategory_name' => $request->sub_subcategory_name,
            'image'                => $filename ?? "",
            'is_active'            => $request->is_active,
        ]);

        return redirect()->route('subsubcategory.all')->with('success', 'Subcategory updated');
    }

    public function DeleteSubSubCategory($id)
    {
        Subsubcategory::findOrFail($id)->update([

            'is_deleted'   => 1,
        ]);

        return redirect()->back()->with('success', 'Subcategory Removed');
    }
}
