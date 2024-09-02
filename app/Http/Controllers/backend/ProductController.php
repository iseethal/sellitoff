<?php

namespace App\Http\Controllers\backend;

use App\Models\Filter;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\CategoryFilter;
use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;
use App\Models\ProductFilterOptions;
use Illuminate\Support\Facades\File;
// use File;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $products = Product::where('is_deleted', '<>', 1)->get();
        return view('backend.product.all_product', compact('products'));
    }

    public function GetSubSubcategory($id)

    {
        if (request()->ajax()) {
            $subsubcategory = Subsubcategory::where('subcategory_id', $id)->get();
            return json_encode($subsubcategory);
        }
    }

    public function AddProduct()
    {
        $category = Category::where('is_deleted', '<>', 1)->get();
        return view('backend.product.add_product', compact('category'));
    }

    public function StoreProduct(Request $request)
    {
        if ($request->file('image') != null) {
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/product'), $filename);
            $path       = "public/backend/image/product/$filename";
        } else {
            $filename   = "";
        }
          // support_image1

          if($request->file('support_image1')!= null){
            $file             = $request->file('support_image1');
            $support_image1   = $file->getClientOriginalName();
            $request->support_image1->move(public_path('backend/image/product'),$support_image1);
            $path             = "public/backend/image/product/$support_image1";
        }
        else{
            $support_image1 = "";
        }

        // support_image2

        if($request->file('support_image2')!= null){
            $file             = $request->file('support_image2');
            $support_image2   = $file->getClientOriginalName();
            $request->support_image2->move(public_path('backend/image/product'),$support_image2);
            $path             = "public/backend/image/product/$support_image2";
        }
        else{
            $support_image2 = "";
        }

          // support_image3

          if($request->file('support_image3')!= null){
            $file             = $request->file('support_image3');
            $support_image3   = $file->getClientOriginalName();
            $request->support_image3->move(public_path('backend/image/product'),$support_image3);
            $path             = "public/backend/image/product/$support_image3";
        }
        else{
            $support_image3 = "";
        }

          // support_image4

          if($request->file('support_image4')!= null){
            $file             = $request->file('support_image4');
            $support_image4   = $file->getClientOriginalName();
            $request->support_image4->move(public_path('backend/image/product'),$support_image4);
            $path             = "public/backend/image/product/$support_image4";
        }
        else{
            $support_image4 = "";
        }

        Product::insert([
            'category_id'          => $request->category_id,
            'subcategory_id'       => $request->subcategory_id ?? 0,
            'sub_subcategory_id'   => $request->sub_subcategory_id ?? 0,
            'product_name'         => $request->product_name,
            'price'                => $request->price,
            'discription'          => $request->description,
            'highlight'            => $request->highlight ?? 0,
            'urgent'               => $request->urgent ?? 0,
            'image'                => $filename ?? "",
            'support_image1'       => $support_image1?? "",
            'support_image2'       => $support_image2?? "",
            'support_image3'       => $support_image3?? "",
            'support_image4'       => $support_image4?? "",
            'is_active'            => $request->is_active,
        ]);

        return redirect()->route('product.all')->with('success', 'New Product added');
    }

    public function EditProduct(Request $request)
    {
        $id                = $request->id;
        $product           = Product::findOrFail($id);
        $category_id       = $product->category_id;
        $subcategory_id    = $product->subcategory_id;
        $category          = Category::where('is_deleted', '<>', 1)->get();
        $subcategory       = Subcategory::where('is_deleted', '<>', 1)->where('category_id', $category_id)->get();
        $sub_subcategory   = Subsubcategory::where('is_deleted', '<>', 1)->where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->get();

        // dd($sub_subcategory);

        // $sub_subcategory   = Subsubcategory::where('is_deleted', '<>', 1)->get();
        return view('backend.product.edit_product', compact('category', 'subcategory', 'product', 'sub_subcategory'));
    }

    public function UpdateProduct(Request $request, $id)
    {
        $id        = $request->id;
        $product   = Product::findOrFail($id);
        if ($request->file('image') != null) {

            $imagePath = public_path('backend/image/product/' . $product->image);

            if(File::exists($imagePath)) {
                File::delete($imagePath);
              }

            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/product'), $filename);
            $path       = "public/backend/image/product/$filename";
        }

            $image      = Product::where('id', $id)->pluck('image')->first();

             // support_image1

        if(request()->hasFile('support_image1') && request('support_image1') != ''){

            $imagePath1 = public_path('backend/image/product/'.$product->support_image1);


              if(File::exists($imagePath1)) {
                File::delete($imagePath1);
              }

            $file             = $request->file('support_image1');
            $support_image1   = $file->getClientOriginalName();
            $request->support_image1->move(public_path('backend/image/product'),$support_image1);
            $path             = "public/backend/image/product/$support_image1";
        }

        // support_image2

        if(request()->hasFile('support_image2') && request('support_image2') != ''){

            $imagePath2 = public_path('backend/image/product/'.$product->support_image2);

            if(File::exists($imagePath2)) {
                File::delete($imagePath2);
              }

            $file             = $request->file('support_image2');
            $support_image2   = $file->getClientOriginalName();
            $request->support_image2->move(public_path('backend/image/product'),$support_image2);
            $path             = "public/backend/image/product/$support_image2";
        }

          // support_image3

          if(request()->hasFile('support_image3') && request('support_image3') != ''){

            $imagePath3 = public_path('backend/image/product/'.$product->support_image3);

            if(File::exists($imagePath3)) {
                File::delete($imagePath3);
              }

            $file             = $request->file('support_image3');
            $support_image3   = $file->getClientOriginalName();
            $request->support_image3->move(public_path('backend/image/product'),$support_image3);
            $path             = "public/backend/image/product/$support_image3";
        }

         // support_image4

         if(request()->hasFile('support_image4') && request('support_image4') != ''){

            $imagePath4 = public_path('backend/image/product/'.$product->support_image4);

            if(File::exists($imagePath4)) {
                File::delete($imagePath4);
              }

            $file             = $request->file('support_image4');
            $support_image4   = $file->getClientOriginalName();
            $request->support_image4->move(public_path('backend/image/product'),$support_image4);
            $path             = "public/backend/image/product/$support_image4";
        }

        $image   = Product::where('id',$id)->pluck('image')->first();
        $image1  = Product::where('id',$id)->pluck('support_image1')->first();
        $image2  = Product::where('id',$id)->pluck('support_image2')->first();
        $image3  = Product::where('id',$id)->pluck('support_image3')->first();
        $image4  = Product::where('id',$id)->pluck('support_image4')->first();

        Product::findOrFail($id)->update([

            'category_id'          => $request->category_id,
            'subcategory_id'       => $request->subcategory_id ?? 0,
            'sub_subcategory_id'   => $request->sub_subcategory_id ?? 0,
            'product_name'         => $request->product_name,
            'price'                => $request->price,
            'description'          => $request->description,
            'highlight'            => $request->highlight ?? 0,
            'urgent'               => $request->urgent ?? 0,
            'image'                => $filename ?? $image,
            'support_image1'       => $support_image1 ?? $image1,
            'support_image2'       => $support_image2 ?? $image2,
            'support_image3'       => $support_image3 ?? $image3,
            'support_image4'       => $support_image4 ?? $image4,
            'is_active'            => $request->is_active,
        ]);

        return redirect()->route('product.all')->with('success', 'Product updated');
    }

    public function DeleteProduct($id)
    {
        Product::findOrFail($id)->update([

            'is_deleted'   => 1,
        ]);

        return redirect()->back()->with('success', 'Product Removed');
    }

    public function ProductFilters()
    {
        $pid               = request()->id;
        $product           = Product::findOrFail($pid);
        $product_name      = $product->product_name;
        $category_id       = $product->category_id;
        $category          = Category::findOrFail($category_id);
        $cat_name          = $category->category_name;
        $category_filter   = CategoryFilter::where('category_id', $category_id)->where('is_deleted', '<>', 1)->get();
        $product_filter_options   = ProductFilterOptions::where('product_id', $pid)->select('filter_option_id')->get();

        $option_idsARR = array();
        foreach ($product_filter_options as $value) {
            array_push($option_idsARR, $value->filter_option_id);
        }

        return view('backend.product.product_filters', compact('category_filter', 'pid', 'product_name', 'cat_name', 'product_filter_options', 'option_idsARR'));
    }

    public function StoreFilterProduct(Request $request)
    {
        $pid            = $request->pid;
        $option_name    = $request->option_name;

        $product_filter_options   = ProductFilterOptions::where('product_id', $pid)->get();
        if($product_filter_options->isEmpty()){

            foreach ($option_name as $item){
                ProductFilterOptions::insert([
                    'product_id'           => $pid,
                    'filter_option_id'     => $item,
                ]);
            }
        } else{

            ProductFilterOptions::where('product_id', $pid)->delete();
            foreach ($option_name as $item){
                ProductFilterOptions::insert([
                    'product_id'           => $pid,
                    'filter_option_id'     => $item,
                ]);
            }
        }

        $products = Product::where('is_deleted', '<>', 1)->get();

        return redirect()->route('product.all');
    }
}
