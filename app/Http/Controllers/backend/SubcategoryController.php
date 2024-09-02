<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function AllSubCategory()
    {
        $subcategories = Subcategory::where('is_deleted', '<>', 1)->get();
        return view('backend.subcategory.all_subcategory', compact('subcategories'));
    }

    public function AddSubCategory()
    {
        $category = Category::where('is_deleted', '<>', 1)->get();
        return view('backend.subcategory.add_subcategory',compact('category'));
    }

    public function StoreSubCategory(Request $request)
    {


        if ($request->file('image') != null) {
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/subcategory'), $filename);
            $path       = "public/backend/image/subcategory/$filename";
        } else {
            $filename = "";
        }

        Subcategory::insert([
            'category_id'      => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'image'            => $filename ?? "",
            'is_active'        => $request->is_active,
        ]);

        return redirect()->route('subcategory.all')->with('success', 'Subcategory added');
    }

    public function EditSubCategory(Request $request)
    {
        $id           = $request->id;
        $subcategory  = Subcategory::findOrFail($id);
        $category     = Category::where('is_deleted', '<>', 1)->get();

        return view('backend.subcategory.edit_subcategory', compact('subcategory','category'));
    }

    public function UpdateSubCategory(Request $request, $id)
    {
        $id        = $request->id;
        $category  = Subcategory::findOrFail($id);


        if($request->file('image')!= null){

            $imagePath = public_path('backend/image/subcategory/'.$category->image);

            if($category->image != null){
                unlink($imagePath);
            }

            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/subcategory'),$filename);
            $path       = "public/backend/image/subcategory/$filename";
        }

        $image  = Subcategory::where('id',$id)->pluck('image')->first();

        Subcategory::findOrFail($id)->update([

            'category_id'      => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'image'            => $filename ?? $image,
            'is_active'        => $request->is_active,
        ]);

        return redirect()->route('subcategory.all')->with('success', 'Subcategory updated' );
    }

    public function DeleteSubCategory($id)
    {
        Subcategory::findOrFail($id)->update([

            'is_deleted'   => 1,
        ]);

        return redirect()->back()->with('success', 'Subcategory Removed' );
    }

}
