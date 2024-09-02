<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Filter;
use App\Models\FilterOption;
use App\Models\CategoryFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function AllCategory()
    {
        $categories = Category::where('is_deleted', '<>', 1)->get();
        return view('backend.category.all_category', compact('categories'));
    }

    public function AddCategory()
    {
        $filters    = Filter::where('is_deleted', '<>', 1)->get();
        $filters_id =  Filter::where('is_deleted', '<>', 1)->select('id')->get();
        return view('backend.category.add_category', compact('filters'));
    }

    public function StoreCategory(Request $request)
    {
        if ($request->file('image') != null) {
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/category'), $filename);
            $path       = "public/backend/image/category/$filename";
        } else {

            $filename = "";
        }

        $cat_nam = $request->category_name;

        Category::insert([

            'category_name' => $request->category_name,
            'image'         => $filename ?? "",
            'is_active'     => $request->is_active,
        ]);

        $catid = Category::where('is_deleted', '<>', 1)->where('category_name', $cat_nam)->pluck('id')->first();

        $filter_id =  $request->filter_id;

        if ($filter_id != 0) {

            foreach ($filter_id as $value) {

                CategoryFilter::insert([

                    'category_id' => $catid,
                    'filter_id' => $value,
                ]);
            }
        }
        return redirect()->route('category.all')->with('success', 'Category added');
    }

    public function EditCategory(Request $request)
    {
        $id           = $request->id;
        $category     = Category::findOrFail($id);

        $category_filter  = CategoryFilter::where('category_id', $id)->where('is_deleted', '<>', 1)->get();

        $filters = Filter::where('is_deleted', '<>', 1)->get();

        return view('backend.category.edit_category', compact('category', 'filters', 'category_filter'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        $id        = $request->id;
        $category  = Category::findOrFail($id);


        if ($request->file('image') != null) {

            $imagePath = public_path('backend/image/category/' . $category->image);

            if ($category->image != null) {
                unlink($imagePath);
            }

            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/category'), $filename);
            $path       = "public/backend/image/category/$filename";
        }

        $image  = category::where('id', $id)->pluck('image')->first();

        Category::findOrFail($id)->update([

            'category_name' => $request->category_name,
            'image'         => $filename ?? $image,
            'is_active'     => $request->is_active,
        ]);


        $cat_filters = CategoryFilter::where('category_id', '=', $id)->exists();
        if ($cat_filters == 1) {

            $deleted = CategoryFilter::where('category_id', '=', $id)->delete();
        }

        $filter_id =  $request->filter_id;
        if ($filter_id != 0) {

            foreach ($filter_id as $value) {

                CategoryFilter::insert([

                    'category_id' => $id,
                    'filter_id' => $value,
                ]);
            }
        }

        return redirect()->route('category.all')->with('success', 'Category updated');
    }

    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->update([

            'is_deleted'     => 1,
        ]);

        return redirect()->back()->with('success', 'Category Removed');
    }
}
