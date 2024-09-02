<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Chat;
use App\Models\Filter;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

use App\Models\Filteroption;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\CategoryFilter;
use App\Models\Subsubcategory;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;
use App\Models\ProductFilterOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{

    public function Show()
    {
        $category = Category::where('is_deleted', '<>', 1)->get();

        return view('backend.product.show', compact('category'));
    }

    public function LoadSubCategory($id) {

        if (request()->ajax()) {

            $subcategory = Subcategory::where('category_id', $id)->get();

            return json_encode($subcategory);

            // return response()->json(['subcategory' => $subcategory ]);

        }

    }

    // shiya
    public function getCounties()
    {
        $region    = Request()->region;
        $counties  = Filteroption::where('is_deleted', '<>', 1)->where('region_id', $region)->where('county_id', 0)->pluck('id', 'option_name');
        return response()->json($counties);
    }

    public function getPlaces()
    {
        $county    = Request()->county;
        $places    = Filteroption::where('is_deleted', '<>', 1)->where('county_id', $county)->pluck('id', 'option_name');
        return response()->json($places);
    }
    // ends

    public function ProductDivision()

    {
        $category = Category::where('is_deleted', '<>', 1)->get();
        return view('frontend.product.productdivision', compact('category'));
    }

    public function AddNewProduct(Request $request)

    {
        $category_id            = $request->category_id;
        $subcategory_id         = $request->subcategory_id;
        $sub_subcategory_id     = $request->sub_subcategory_id;
        $category_filter        = CategoryFilter::where('category_id', $category_id)->where('is_deleted', '<>', 1)->get();

        // return redirect()->route('frontend.product.addnewproduct')->with('category_filter', 'category_id', 'subcategory_id', 'sub_subcategory_id');

        return view('frontend.product.addnewproduct', compact('category_filter', 'category_id', 'subcategory_id', 'sub_subcategory_id'));
    }

    //jacqu

    public function ProductEdit(Request $request)
    {

        $Pid                    = $request->id;
        $product                = Product::find($Pid);
        $category_id            = $product->category_id;
        $subcategory_id         = $product->subcategory_id;
        $category               = Category::where('is_deleted', '<>', 1)->get();
        $category_filter        = CategoryFilter::where('category_id', $category_id)->where('is_deleted', '<>', 1)->get();
        $subcategory            = Subcategory::where('is_deleted', '<>', 1)->where('category_id', $category_id)->get();
        $sub_subcategory        = Subsubcategory::where('is_deleted', '<>', 1)->where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->get();


        $product_filter_options   = ProductFilterOptions::where('product_id', $Pid)->select('filter_option_id')->get();
        $option_idsARR = array();
        foreach ($product_filter_options as $value) {
            array_push($option_idsARR, $value->filter_option_id);
        }

        return view('frontend.product.editproduct', compact('product', 'category', 'category_filter', 'subcategory', 'sub_subcategory', 'product_filter_options', 'option_idsARR'));
    }

    public function GetNewProduct(Request $request)
    {

        $Pid                    = Product::orderBy('id', 'desc')->pluck('id')->first();
        $product                = Product::find($Pid);
        $category_id            = $product->category_id;
        $subcategory_id         = $product->subcategory_id;
        $category               = Category::where('is_deleted', '<>', 1)->get();
        $category_filter        = CategoryFilter::where('category_id', $category_id)->where('is_deleted', '<>', 1)->get();
        $subcategory            = Subcategory::where('is_deleted', '<>', 1)->where('category_id', $category_id)->get();
        $sub_subcategory        = Subsubcategory::where('is_deleted', '<>', 1)->where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->get();


        $product_filter_options   = ProductFilterOptions::where('product_id', $Pid)->select('filter_option_id')->get();
        $option_idsARR = array();
        foreach ($product_filter_options as $value) {
            array_push($option_idsARR, $value->filter_option_id);
        }

        $today  = Carbon::now()->format('Y:m:d');

        //  $user_subscription = UserSubscription::where('user_id', Auth::user()->id)->whereDate('end_date', '>=', $today)->orderBy('id','desc')->exists();


        $check_product     = Product::where('user_id', Auth::user()->id)->where('subscription_id', 0)->orderBy('id', 'desc')->exists();
        if ($check_product == 1) {

            return view('frontend.product.get_product', compact('product', 'category', 'category_filter', 'subcategory', 'sub_subcategory', 'product_filter_options', 'option_idsARR'));
        } else {
            return redirect()->route('frontend.home');
        }
    }
    public function ProductUpdate(Request $request)
    {

        $id = $request->id;

        $id        = $request->id;
        $product   = Product::findOrFail($id);
        if ($request->file('image') != null) {

            $imagePath = public_path('backend/image/product/' . $product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/product'), $filename);
            $path       = "public/backend/image/product/$filename";
        }

        $image      = Product::where('id', $id)->pluck('image')->first();

        // support_image1

        if (request()->hasFile('support_image1') && request('support_image1') != '') {

            $imagePath1 = public_path('backend/image/product/' . $product->support_image1);


            if (File::exists($imagePath1)) {
                File::delete($imagePath1);
            }

            $file             = $request->file('support_image1');
            $support_image1   = $file->getClientOriginalName();
            $request->support_image1->move(public_path('backend/image/product'), $support_image1);
            $path             = "public/backend/image/product/$support_image1";
        }

        // support_image2

        if (request()->hasFile('support_image2') && request('support_image2') != '') {

            $imagePath2 = public_path('backend/image/product/' . $product->support_image2);

            if (File::exists($imagePath2)) {
                File::delete($imagePath2);
            }

            $file             = $request->file('support_image2');
            $support_image2   = $file->getClientOriginalName();
            $request->support_image2->move(public_path('backend/image/product'), $support_image2);
            $path             = "public/backend/image/product/$support_image2";
        }

        // support_image3

        if (request()->hasFile('support_image3') && request('support_image3') != '') {

            $imagePath3 = public_path('backend/image/product/' . $product->support_image3);

            if (File::exists($imagePath3)) {
                File::delete($imagePath3);
            }

            $file             = $request->file('support_image3');
            $support_image3   = $file->getClientOriginalName();
            $request->support_image3->move(public_path('backend/image/product'), $support_image3);
            $path             = "public/backend/image/product/$support_image3";
        }

        // support_image4

        if (request()->hasFile('support_image4') && request('support_image4') != '') {

            $imagePath4 = public_path('backend/image/product/' . $product->support_image4);

            if (File::exists($imagePath4)) {
                File::delete($imagePath4);
            }

            $file             = $request->file('support_image4');
            $support_image4   = $file->getClientOriginalName();
            $request->support_image4->move(public_path('backend/image/product'), $support_image4);
            $path             = "public/backend/image/product/$support_image4";
        }

        // support_image5

        if (request()->hasFile('support_image5') && request('support_image5') != '') {

            $imagePath5 = public_path('backend/image/product/' . $product->support_image5);

            if (File::exists($imagePath5)) {
                File::delete($imagePath5);
            }

            $file             = $request->file('support_image5');
            $support_image5   = $file->getClientOriginalName();
            $request->support_image5->move(public_path('backend/image/product'), $support_image5);
            $path             = "public/backend/image/product/$support_image5";
        }

        // support_image6

        if (request()->hasFile('support_image6') && request('support_image6') != '') {

            $imagePath6 = public_path('backend/image/product/' . $product->support_image6);

            if (File::exists($imagePath6)) {
                File::delete($imagePath6);
            }

            $file             = $request->file('support_image6');
            $support_image6   = $file->getClientOriginalName();
            $request->support_image6->move(public_path('backend/image/product'), $support_image6);
            $path             = "public/backend/image/product/$support_image6";
        }

        // support_image7

        if (request()->hasFile('support_image7') && request('support_image7') != '') {

            $imagePath7 = public_path('backend/image/product/' . $product->support_image7);

            if (File::exists($imagePath7)) {
                File::delete($imagePath7);
            }

            $file             = $request->file('support_image7');
            $support_image7   = $file->getClientOriginalName();
            $request->support_image7->move(public_path('backend/image/product'), $support_image7);
            $path             = "public/backend/image/product/$support_image7";
        }

        // support_image8

        if (request()->hasFile('support_image8') && request('support_image8') != '') {

            $imagePath8 = public_path('backend/image/product/' . $product->support_image8);

            if (File::exists($imagePath8)) {
                File::delete($imagePath8);
            }

            $file             = $request->file('support_image8');
            $support_image8   = $file->getClientOriginalName();
            $request->support_image8->move(public_path('backend/image/product'), $support_image8);
            $path             = "public/backend/image/product/$support_image8";
        }

        // support_image9

        if (request()->hasFile('support_image9') && request('support_image9') != '') {

            $imagePath9 = public_path('backend/image/product/' . $product->support_image9);

            if (File::exists($imagePath9)) {
                File::delete($imagePath9);
            }

            $file             = $request->file('support_image9');
            $support_image9   = $file->getClientOriginalName();
            $request->support_image9->move(public_path('backend/image/product'), $support_image9);
            $path             = "public/backend/image/product/$support_image9";
        }

        // support_image10

        if (request()->hasFile('support_image10') && request('support_image10') != '') {

            $imagePath10 = public_path('backend/image/product/' . $product->support_image10);

            if (File::exists($imagePath10)) {
                File::delete($imagePath10);
            }

            $file             = $request->file('support_image10');
            $support_image10   = $file->getClientOriginalName();
            $request->support_image10->move(public_path('backend/image/product'), $support_image10);
            $path             = "public/backend/image/product/$support_image10";
        }

        $image   = Product::where('id', $id)->pluck('image')->first();
        $image1  = Product::where('id', $id)->pluck('support_image1')->first();
        $image2  = Product::where('id', $id)->pluck('support_image2')->first();
        $image3  = Product::where('id', $id)->pluck('support_image3')->first();
        $image4  = Product::where('id', $id)->pluck('support_image4')->first();
        $image5  = Product::where('id', $id)->pluck('support_image5')->first();
        $image6  = Product::where('id', $id)->pluck('support_image6')->first();
        $image7  = Product::where('id', $id)->pluck('support_image7')->first();
        $image8  = Product::where('id', $id)->pluck('support_image8')->first();
        $image9  = Product::where('id', $id)->pluck('support_image9')->first();
        $image10 = Product::where('id', $id)->pluck('support_image10')->first();

        $category_id        = Product::where('id', $id)->pluck('category_id')->first();
        $subcategory_id     = Product::where('id', $id)->pluck('subcategory_id')->first();
        $sub_subcategory_id = Product::where('id', $id)->pluck('sub_subcategory_id')->first();

        // check subscription exists
        $today  = Carbon::now()->format('Y:m:d');

        $user_subscription = UserSubscription::where('user_id', Auth::user()->id)->whereDate('end_date', '>=', $today)->orderBy('id', 'desc')->exists();
        if ($user_subscription == 1) {

            $subscription_id  = UserSubscription::where('user_id', Auth::user()->id)->whereDate('end_date', '>=', $today)->orderBy('id', 'desc')->pluck('id')->first();
            $sub_id           =  UserSubscription::where('id',$subscription_id)->pluck('subscription_id')->first();

            $product_tag      = Subscription::where('id', $sub_id)->pluck('product_tag')->first();

            if ($product_tag == 1) {

                $highlight = 1;
            } else if ($product_tag == 2) {

                $urgent = 1;
            }

            $is_deleted      = 0;
            $is_active       = $request->is_active;
            $subscription_id = $subscription_id;

        } else {
            $is_deleted      = 1;
            $is_active       = 1;
        }

        Product::findOrFail($id)->update([

            'category_id'          => $request->category_id ?? $category_id,
            'subcategory_id'       => $request->subcategory_id ?? $subcategory_id,
            'sub_subcategory_id'   => $request->sub_subcategory_id ?? $sub_subcategory_id,
            'product_name'         => $request->product_name,
            'price'                => $request->price,
            'description'          => $request->description ?? "",
            'image'                => $filename ?? $image,
            'support_image1'       => $support_image1 ?? $image1,
            'support_image2'       => $support_image2 ?? $image2,
            'support_image3'       => $support_image3 ?? $image3,
            'support_image4'       => $support_image4 ?? $image4,
            'support_image5'       => $support_image5 ?? $image5,
            'support_image6'       => $support_image6 ?? $image6,
            'support_image7'       => $support_image7 ?? $image7,
            'support_image8'       => $support_image9 ?? $image8,
            'support_image9'       => $support_image9 ?? $image9,
            'support_image10'      => $support_image10 ?? $image10,
            'is_active'            => $is_active,
            'is_deleted'           => $is_deleted,
            'subscription_id'      => $subscription_id,
            'urgent'               => $urgent ?? 0,
            'highlight'            => $highlight ?? 0,

        ]);

        // CHECK CATEGORY HAS FILTER OPTION

        $check_filter = CategoryFilter::where('category_id', $category_id)->exists();
        // PRODUCT FILTERS INSERTION

        if ($check_filter == 1) {

            $option_name    = $request->option_name;
            $region         = $request->region;
            $county         = $request->county;
            $place          = $request->place;

            $product_filter_options   = ProductFilterOptions::where('product_id', $id)->get();

            if ($product_filter_options->isEmpty()) {
                foreach ($option_name as $item) {

                    if ($item != "0") {

                        ProductFilterOptions::insert([
                            'product_id'           => $id,
                            'filter_option_id'     => $item,
                        ]);
                    }
                }

                // STORE REGION
                if ($region != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $id,
                        'filter_option_id'     => $region,
                    ]);
                }

                // STORE COUNTY
                if ($county != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $id,
                        'filter_option_id'     => $county,
                    ]);
                }

                // STORE PLACE
                if ($place != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $id,
                        'filter_option_id'     => $place,
                    ]);
                }
            } else {

                ProductFilterOptions::where('product_id', $id)->delete();
                foreach ($option_name as $item) {
                    if ($item != "0") {

                        ProductFilterOptions::insert([
                            'product_id'           => $id,
                            'filter_option_id'     => $item,
                        ]);
                    }
                }

                // STORE REGION
                if ($region != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $id,
                        'filter_option_id'     => $region,
                    ]);
                }

                // STORE COUNTY
                if ($county != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $id,
                        'filter_option_id'     => $county,
                    ]);
                }

                // STORE PLACE
                if ($place != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $id,
                        'filter_option_id'     => $place,
                    ]);
                }
            }
        }

        return redirect()->route('frontend.product.singleproduct', ['id' => $id]);

        // return back();
    }

    public function StoreProductt(Request $request)
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

        if ($request->file('support_image1') != null) {
            $file             = $request->file('support_image1');
            $support_image1   = $file->getClientOriginalName();
            $request->support_image1->move(public_path('backend/image/product'), $support_image1);
            $path             = "public/backend/image/product/$support_image1";
        } else {
            $support_image1 = "";
        }

        // support_image2

        if ($request->file('support_image2') != null) {
            $file             = $request->file('support_image2');
            $support_image2   = $file->getClientOriginalName();
            $request->support_image2->move(public_path('backend/image/product'), $support_image2);
            $path             = "public/backend/image/product/$support_image2";
        } else {
            $support_image2 = "";
        }

        // support_image3

        if ($request->file('support_image3') != null) {
            $file             = $request->file('support_image3');
            $support_image3   = $file->getClientOriginalName();
            $request->support_image3->move(public_path('backend/image/product'), $support_image3);
            $path             = "public/backend/image/product/$support_image3";
        } else {
            $support_image3 = "";
        }

        // support_image4

        if ($request->file('support_image4') != null) {
            $file             = $request->file('support_image4');
            $support_image4   = $file->getClientOriginalName();
            $request->support_image4->move(public_path('backend/image/product'), $support_image4);
            $path             = "public/backend/image/product/$support_image4";
        } else {

            $support_image4 = "";
        }

        //  support_image5

        if ($request->file('support_image5') != null) {
            $file             = $request->file('support_image5');
            $support_image5   = $file->getClientOriginalName();
            $request->support_image5->move(public_path('backend/image/product'), $support_image5);
            $path             = "public/backend/image/product/$support_image5";
        } else {

            $support_image5 = "";
        }

        //  support_image6

        if ($request->file('support_image6') != null) {
            $file             = $request->file('support_image6');
            $support_image6   = $file->getClientOriginalName();
            $request->support_image6->move(public_path('backend/image/product'), $support_image6);
            $path             = "public/backend/image/product/$support_image6";
        } else {

            $support_image6 = "";
        }

        //  support_image7

        if ($request->file('support_image7') != null) {
            $file             = $request->file('support_image7');
            $support_image7   = $file->getClientOriginalName();
            $request->support_image7->move(public_path('backend/image/product'), $support_image7);
            $path             = "public/backend/image/product/$support_image7";
        } else {

            $support_image7 = "";
        }

        //  support_image8

        if ($request->file('support_image8') != null) {
            $file             = $request->file('support_image8');
            $support_image8   = $file->getClientOriginalName();
            $request->support_image8->move(public_path('backend/image/product'), $support_image8);
            $path             = "public/backend/image/product/$support_image8";
        } else {

            $support_image8 = "";
        }

        //   support_image9

        if ($request->file('support_image9') != null) {
            $file             = $request->file('support_image9');
            $support_image9   = $file->getClientOriginalName();
            $request->support_image9->move(public_path('backend/image/product'), $support_image9);
            $path             = "public/backend/image/product/$support_image9";
        } else {

            $support_image9 = "";
        }

        //  support_image10

        if ($request->file('support_image10') != null) {
            $file             = $request->file('support_image10');
            $support_image10   = $file->getClientOriginalName();
            $request->support_image10->move(public_path('backend/image/product'), $support_image10);
            $path             = "public/backend/image/product/$support_image10";
        } else {

            $support_image10 = "";
        }
        //check subscription

        $user       = Auth::user();
        $user_plan  = $user->user_plan_type;
        $today             = Carbon::now()->format('Y:m:d');
        $main_category_id  = Category::where('id', $request->category_id)->pluck('main_category_id')->first();

        $user_subscription = UserSubscription::where('user_id', Auth::user()->id)->whereDate('end_date', '>=', $today)->where('main_category_id', $main_category_id)->where('item_count', '<>', 0)->where('is_expired', '<>', 1)->exists();

        if ($user_subscription == 1) {

            $subscription_id  = UserSubscription::where('user_id', Auth::user()->id)->whereDate('end_date', '>=', $today)->where('main_category_id', $main_category_id)->where('item_count', '<>', 0)->where('is_expired', '<>', 1)->pluck('id')->first();
            $sub_id           = UserSubscription::where('id',$subscription_id)->pluck('subscription_id')->first();
            $product_tag      = Subscription::where('id', $sub_id)->pluck('product_tag')->first();

            if ($product_tag == 1) {

                $highlight = 1;
            } else if ($product_tag == 2) {

                $urgent = 1;
            }

            $is_deleted       = 0;
            $subscription_id  = $subscription_id;

        } else {
            $is_deleted       = 1;
            $subscription_id  = 0;
        }

        $pid = Product::insertGetId([

            'user_id'              => Auth::user()->id,
            'category_id'          => $request->category_id,
            'subcategory_id'       => $request->subcategory_id ?? 0,
            'sub_subcategory_id'   => $request->sub_subcategory_id ?? 0,
            'product_name'         => $request->product_name,
            'price'                => $request->price,
            'description'          => $request->description ?? "",
            'highlight'            => $request->highlight ?? 0,
            'urgent'               => $request->urgent ?? 0,
            'image'                => $filename ?? "",
            'support_image1'       => $support_image1 ?? "",
            'support_image2'       => $support_image2 ?? "",
            'support_image3'       => $support_image3 ?? "",
            'support_image4'       => $support_image4 ?? "",
            'support_image5'       => $support_image5 ?? "",
            'support_image6'       => $support_image6 ?? "",
            'support_image7'       => $support_image7 ?? "",
            'support_image8'       => $support_image8 ?? "",
            'support_image9'       => $support_image9 ?? "",
            'support_image10'      => $support_image10 ?? "",
            'is_active'            => 1,
            'is_deleted'           => $is_deleted,
            'subscription_id'      => $subscription_id,
            'urgent'               => $urgent ?? 0,
            'highlight'            => $highlight ?? 0,


        ]);



        // chek user plan is individual or business
        // item count
        if ($user_subscription == 1) {

            if ($user_plan == 2) {

                $user_sub_id  = UserSubscription::where('user_id', Auth::user()->id)->where('main_category_id', $main_category_id)->pluck('id')->first();
                $balance      = UserSubscription::where('user_id', Auth::user()->id)->where('main_category_id', $main_category_id)->pluck('balance')->first();

                if ($balance == 1) {
                    UserSubscription::findOrFail($user_sub_id)->update([

                        'is_expired' => 1,
                        'balance'    => $balance - 1,


                    ]);
                } else {
                    UserSubscription::findOrFail($user_sub_id)->update([

                        'balance'   => $balance - 1,

                    ]);
                }
            } else {

                $user_sub_id  = UserSubscription::where('user_id', Auth::user()->id)->where('main_category_id', $main_category_id)->pluck('id')->first();

                UserSubscription::findOrFail($user_sub_id)->update([

                    'is_expired'   => 1,

                ]);
            }
        }

        // CHECK CATEGORY HAS FILTER OPTION
        $check_filter = CategoryFilter::where('category_id', $request->category_id)->exists();

        // PRODUCT FILTERS INSERTION
        if ($check_filter == 1) {

            $option_name    = $request->option_name;
            $region         = $request->region;
            $county         = $request->county;
            $place          = $request->place;

            $product_filter_options   = ProductFilterOptions::where('product_id', $pid)->get();
            if ($product_filter_options->isEmpty()) {
                foreach ($option_name as $item) {

                    if ($item != "0") {

                        ProductFilterOptions::insert([
                            'product_id'           => $pid,
                            'filter_option_id'     => $item,
                        ]);
                    }
                }

                // STORE REGION
                if ($region != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $pid,
                        'filter_option_id'     => $region,
                    ]);
                }

                // STORE COUNTY
                if ($county != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $pid,
                        'filter_option_id'     => $county,
                    ]);
                }

                // STORE PLACE
                if ($place != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $pid,
                        'filter_option_id'     => $place,
                    ]);
                }
            } else {

                ProductFilterOptions::where('product_id', $pid)->delete();
                foreach ($option_name as $item) {

                    if ($item != "0") {
                        ProductFilterOptions::insert([
                            'product_id'           => $pid,
                            'filter_option_id'     => $item,
                        ]);
                    }
                }

                // STORE REGION
                if ($region != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $pid,
                        'filter_option_id'     => $region,
                    ]);
                }

                // STORE COUNTY
                if ($county != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $pid,
                        'filter_option_id'     => $county,
                    ]);
                }

                // STORE PLACE
                if ($place != "0") {
                    ProductFilterOptions::insert([
                        'product_id'           => $pid,
                        'filter_option_id'     => $place,
                    ]);
                }
            }
        }


        if ($user_subscription != 0) {

            $singleproduct          = Product::where('id', $pid)->get();
            $category_id            = Product::where('id', $pid)->pluck('category_id');
            $product_user           = Product::where('id', $pid)->pluck('user_id');
            $categoryfilter         = CategoryFilter::where('category_id', $category_id)->where('is_deleted', '<>', 1)->select('filter_id')->get();
            $productfilteroption    = ProductFilterOptions::where('product_id', $pid)->select('filter_option_id')->get();

            $id  = Product::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->pluck('id')->first();

            return redirect()->route('frontend.product.singleproduct', ['id' => $id])->with('message', 'Product added successfully ');
        } else {


            $main_category_id  = Category::where('id', $request->category_id)->pluck('main_category_id')->first();

            if ($user_plan == 1) {

                if ($main_category_id == 1) {

                    return redirect()->route('frontend.subscriptonplantypes', ['id' => 1])->with('message', 'You dont have an active plan. Please choose a plan ');
                } else if ($main_category_id == 2) {

                    return redirect()->route('frontend.subscriptonplantypes', ['id' => 2])->with('message', 'You dont have an active plan. Please choose a plan ');
                } else if ($main_category_id == 3) {

                    return redirect()->route('frontend.subscriptonplantypes', ['id' => 3])->with('message', 'You dont have an active plan. Please choose a plan ');
                } else {

                    return redirect()->route('frontend.subscriptonplantypes', ['id' => 4])->with('message', 'You dont have an active plan. Please choose a plan ');
                }
            } else {

                if ($main_category_id == 1) {

                    return redirect()->route('frontend.subscriptonplantypesbussiness', ['id' => 1])->with('message', 'You dont have an active plan. Please choose a plan ');
                } else if ($main_category_id == 2) {

                    return redirect()->route('frontend.subscriptonplantypesbussiness', ['id' => 2])->with('message', 'You dont have an active plan. Please choose a plan ');
                } else {

                    return redirect()->route('frontend.subscriptonplantypesbussiness', ['id' => 5])->with('message', 'You dont have an active plan. Please choose a plan ');
                }
            }
        }
    }

    public function SingleProduct()
    {
        $id                     = Request()->id;
        $single_product         = Product::findOrFail($id);
        $product_user           = Product::where('id', $id)->pluck('user_id');
        $categoryfilter         = CategoryFilter::where('category_id', $single_product->category_id)->where('is_deleted', '<>', 1)->select('filter_id')->get();
        // $productfilteroption    = ProductFilterOptions::where('product_id',$id )->select('filter_option_id')->get();
        return view('frontend.product.singleproduct', compact('single_product', 'product_user'));
    }

    public function AllProducts()
    {
        $id       = Request()->id;
        $products = Product::where('is_deleted', '<>', 1)->where('sub_subcategory_id', $id)->get();
        return view('frontend.products', compact('products'));
    }

    public function GetSubSubcategory($id)

    {
        if (request()->ajax()) {
            $subsubcategory = Subsubcategory::where('subcategory_id', $id)->get();
            return json_encode($subsubcategory);
        }
    }

    //neew

    public function Addproduct()
    {
        $category = Category::where('is_deleted', '<>', 1)->get();
        return view('frontend.product.addproduct', compact('category'));
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

        Product::insert([
            'category_id'          => $request->category_id,
            'subcategory_id'       => $request->subcategory_id ?? 0,
            'sub_subcategory_id'   => $request->sub_subcategory_id ?? 0,
            'product_name'         => $request->product_name,
            'image'                => $filename ?? "",
            'is_active'            => $request->is_active,
        ]);
        return redirect()->back()->with('message', 'New Product added sucessfully');
    }
    public function CategoryAllProducts()
    {
        $id                  = Request()->id;
        $categoryallproducts = Product::where('is_deleted', '<>', 1)->where('is_active', 1)->where('category_id', $id)->orderBy('urgent', 'desc')->orderBy('highlight', 'desc')->get();
        $categoryfilter      = CategoryFilter::where('category_id', $id)->where('is_deleted', '<>', 1)->select('filter_id')->get();
        return view('frontend.categoryallproducts', compact('categoryallproducts', 'categoryfilter'));
    }
    public function StoreCategoryAllProducts(request $request)
    {
        $id                         = $request->id;
        $optionname                 = $request->option_name;

        if ($optionname != null) {

            $productfilteroptions       =  ProductFilterOptions::whereIn('filter_option_id', $optionname)->select('product_id')->groupBy('product_id')->get();
            $productfilteroptionsidsARR = array();

            foreach ($productfilteroptions as $value) {
                array_push($productfilteroptionsidsARR, $value->product_id);
            }

            $categoryallproducts  = Product::where('is_deleted', '<>', 1)->whereIn('id', $productfilteroptionsidsARR)->where('category_id', $id)->orderBy('urgent', 'desc')->orderBy('highlight', 'desc')->get();
            $category_id          = Product::where('is_deleted', '<>', 1)->where('category_id', $id)->select('category_id')->first();
            $categoryfilter       = CategoryFilter::where('category_id', $id)->where('is_deleted', '<>', 1)->select('filter_id')->get();

            return view('frontend.categoryallproducts', compact('categoryfilter', 'categoryallproducts', 'productfilteroptions', 'optionname'));
        }
        if ($optionname == null) {

            $categoryallproducts = Product::where('is_deleted', '<>', 1)->where('category_id', $id)->orderBy('urgent', 'desc')->orderBy('highlight', 'desc')->get();
            $categoryfilter      = CategoryFilter::where('category_id', $id)->where('is_deleted', '<>', 1)->select('filter_id')->get();
            return view('frontend.categoryallproducts', compact('categoryallproducts', 'categoryfilter'));
        }
    }
    public function SubofsubcategoryAllproducts()
    {
        $id                          = Request()->id;
        $subofsubcategoryallproducts = Product::where('is_deleted', '<>', 1)->where('is_active', 1)->where('sub_subcategory_id', $id)->orderBy('urgent', 'desc')->orderBy('highlight', 'desc')->get();
        $category_id                 = Product::where('is_deleted', '<>', 1)->where('sub_subcategory_id', $id)->pluck('category_id')->first();
        $categoryfilter              = CategoryFilter::where('category_id', $category_id)->where('is_deleted', '<>', 1)->select('filter_id')->get();
        return view('frontend.subofsubcategoryallproducts', compact('subofsubcategoryallproducts', 'categoryfilter',));
    }
    public function StoreSubofsubcategoryAllproducts(Request $request)
    {
        $id                         = $request->id;
        $optionname                 = $request->option_name;

        if ($optionname != null) {

            $productfilteroptions       =  ProductFilterOptions::whereIn('filter_option_id', $optionname)->select('product_id')->groupBy('product_id')->get();
            $productfilteroptionsidsARR = array();

            foreach ($productfilteroptions as $value) {
                array_push($productfilteroptionsidsARR, $value->product_id);
            }

            $subofsubcategoryallproducts = Product::where('is_deleted', '<>', 1)->whereIn('id', $productfilteroptionsidsARR)->where('sub_subcategory_id', $id)->orderBy('urgent', 'desc')->orderBy('highlight', 'desc')->get();
            $category_id                 = Product::where('is_deleted', '<>', 1)->where('is_active', 1)->where('sub_subcategory_id', $id)->select('category_id')->first();
            $categoryfilter              = CategoryFilter::where('category_id', $category_id['category_id'])->where('is_deleted', '<>', 1)->select('filter_id')->get();

            return view('frontend.subofsubcategoryallproducts', compact('categoryfilter', 'subofsubcategoryallproducts', 'productfilteroptions', 'optionname'));
        }

        if ($optionname == null) {

            $subofsubcategoryallproducts = Product::where('is_deleted', '<>', 1)->where('is_active', 1)->where('sub_subcategory_id', $id)->orderBy('urgent', 'desc')->orderBy('highlight', 'desc')->get();
            $category_id                 = Product::where('is_deleted', '<>', 1)->where('is_active', 1)->where('sub_subcategory_id', $id)->select('category_id')->first();
            $categoryfilter              = CategoryFilter::where('category_id', $category_id['category_id'])->where('is_deleted', '<>', 1)->select('filter_id')->get();
            return view('frontend.subofsubcategoryallproducts', compact('subofsubcategoryallproducts', 'categoryfilter',));
        }
    }

    public function SubcategoryAllProducts()
    {
        $id                     = Request()->id;
        $category_id            = Subcategory::where('id', $id)->pluck('category_id')->first();
        $subcategoryallproducts = Product::where('is_deleted', '<>', 1)->where('is_active', 1)->where('subcategory_id', $id)->orderBy('id', 'desc')->orderBy('highlight', 'desc')->where('is_active', 1)->get();
        $categoryfilter         = CategoryFilter::where('category_id', $category_id)->where('is_deleted', '<>', 1)->select('filter_id')->get();


        return view('frontend.subcategoryallproducts', compact('subcategoryallproducts', 'categoryfilter'));
    }
    public function StoreSubcategoryAllProducts(Request $request)
    {

        $id                         = Request()->id;
        $optionname                 = $request->option_name;
        if ($optionname != null) {

            $productfilteroptions       =  ProductFilterOptions::whereIn('filter_option_id', $optionname)->select('product_id')->groupBy('product_id')->get();
            $productfilteroptionsidsARR = array();

            foreach ($productfilteroptions as $value) {
                array_push($productfilteroptionsidsARR, $value->product_id);
            }

            $category_id            = Product::where('is_deleted', '<>', 1)->where('is_active', 1)->where('subcategory_id', $id)->select('category_id')->first();
            $subcategoryallproducts = Product::where('is_deleted', '<>', 1)->where('is_active', 1)->whereIn('id', $productfilteroptionsidsARR)->where('subcategory_id', $id)->orderBy('urgent', 'desc')->orderBy('highlight', 'desc')->get();

            $categoryfilter         = CategoryFilter::where('category_id', $id)->where('is_deleted', '<>', 1)->select('filter_id')->get();
            return view('frontend.subcategoryallproducts', compact('subcategoryallproducts', 'categoryfilter', 'optionname'));
        }
        if ($optionname == null) {

            $subcategoryallproducts = Product::where('is_deleted', '<>', 1)->where('subcategory_id', $id)->orderBy('urgent', 'desc')->orderBy('highlight', 'desc')->get();
            $categoryfilter         = CategoryFilter::where('category_id', $id)->where('is_deleted', '<>', 1)->select('filter_id')->get();

            return view('frontend.subcategoryallproducts', compact('subcategoryallproducts', 'categoryfilter'));
        }
    }


    // CHAT WITH BUYER & SELLER
    public function Chat()
    {
        return view('frontend.product.chat');
    }

    public function StoreChat(Request $request)
    {

        $chat     = $request->all();
        $userid   = Product::where('id', $chat['product_id'])->select('user_id')->get();

        foreach ($userid as $val) {
            $user_id = $val->user_id;
        }

        // $username = User::where('id', $user_id)->select('name')->get();
        // foreach($username as $nam) {
        //     $user_name = $nam->name;
        // }

        $productid  = $chat['product_id'];
        $sender     = Auth::user()->id;
        $key        =  $productid . "_" . $sender . "_" . $user_id;
        // dd( $key );

        Chat::insert([
            'chat_key'   => $key,
            'sender'     => $sender ?? '',
            'reciever'   => $user_id  ?? '',
            'product_id' => $chat['product_id'] ?? 0,
            'message'    => $request->message,
            'time_send'  => Carbon::now(),
        ]);

        // return redirect()->route('frontend.product.chat');
        return response()->json();
    }
    // ENDS

    public function GetSingleProduct(Request $request)
    {
        $single_product    = session()->get('single_product', []);

        $single_product[$request->id] = [

            "id" => $request->id,
        ];
        session()->put('single_product', $single_product);

        return redirect()->route('login');
    }

}
