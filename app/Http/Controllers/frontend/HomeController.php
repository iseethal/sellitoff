<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Chat;
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function Home()
    {
        $sliders          = Slider::where('is_deleted', '<>', 1)->get();
        $category         = Category::where('is_deleted', '<>', 1)->get();
        $subcategory      = Subcategory::where('is_deleted', '<>', 1)->get();
        $sub_subcategory  = Subsubcategory::where('is_deleted', '<>', 1)->get();
        $urgentproducts   = Product::where('is_deleted', '<>', 1)->where('urgent', '=', 1)->get();
        // dd($sub_subcategory->toArray());

        return view('frontend.home', compact('sliders', 'category', 'subcategory', 'sub_subcategory', 'urgentproducts'));
    }

    public function Chat() {

        return view('frontend.product.chat');
    }

    public function StoreChat(Request $request) {

        $product_id     = $request->message;
        $sender         = Auth::user()->id;
        $reciever       = Product::where('id', $product_id)->pluck('user_id')->first();

        Chat::insert([

            'message'       => $request->message,
            'sender'        => $sender,
            'reciever'      => $request->reciever,
            'product_id'    => $request->product_id,
            'time_send'     => Carbon::now(),
        ]);

        return response()->json();
    }

    public function contact() {
        return view('frontend.contact');
    }

    public function About(){
        return view('frontend.about');
    }

    public function UserProfile()
    {
        $user_id                    = Auth::user()->id;
        $user                       = User::findorfail($user_id);
        $products                   = Product::where('user_id', $user_id)->select('product_name','id')->limit(5)->get();
        $user_subscriptions  = UserSubscription::where('user_id', Auth::user()->id)->get();

        return view('frontend.profile.profile', compact('user', 'products','user_subscriptions'));
    }

    public function UserProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        User::findOrFail($id)->update([

            'name'        => $request->name,
            'sur_name'    => $request->sur_name,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'user_type'   => $request->user_type,
            'show_mobile' => $request->show_mobile?? 1,

        ]);

        // return redirect()->route('frontend.home');
        return redirect()->back()->with('message', 'Profile updated ');

    }

    public function Myadds() {

        $userid   = Auth::user()->id;
        $products = Product::where('user_id',$userid)->where('is_deleted','<>',1)->orderBy('id','desc')->get();
        return view('frontend.myadds',compact('products'));
    }

    public function Getsubcategorys($id)
    {
        if (request()->ajax()) {

            $out    = '';

            $cat    = '';
            $subcat = '';
            $ss     = '';
            $id     = request()->all();

            if($id['id'] == '0'){
                return response()->json("");
            }

            $subcategorys  = Subcategory::where('is_deleted', '<>', 1)->where('category_id', $id['id'])->select('subcategory_name','id','category_id')->get();
            $category      = Category::where('id', $id['id'])->select('category_name','id')->get();

            if($subcategorys->isEmpty() ) {

                foreach ($category as $item) {

                    $cat .= "<label><h6 style='color:black'>category</h6> </label></br>
                        <li><a href='https://demo.gisaxiom.com/sell_it_off/public/categoryallproducts?id=$item->id'><b>$item->category_name</b></a></li>";
                    }
                }

                foreach ($subcategorys as $item) {

                    $subcat .= "<li><b><a href='https://demo.gisaxiom.com/sell_it_off/public/subcategoryallproducts?id=$item->id'>$item->subcategory_name</b></a></li>";
                    $subofsubcategorys  = Subsubcategory::where('is_deleted', '<>', 1)->where('category_id', $id['id'])->where('subcategory_id',$item->id)->select('sub_subcategory_name','id')->get();

                    foreach ($subofsubcategorys as $value) {

                        $ss .= "<li style='color:green;'><b><a href='https://demo.gisaxiom.com/sell_it_off/public/sub_subcategorys?id=$item->id' style='color:green;'>$value->sub_subcategory_name</a></b> </li>";
                    }

                    $total = "";
                    $total = $subcat .= $ss ;
                }


            $out = '<div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
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
                        $out .='<li><b><a href="https://demo.gisaxiom.com/sell_it_off/public/subcategoryallproducts?id='; $out .=$item->id; $out .='">'; $out .=$item->subcategory_name; $out .='</b></a></li>';
                        $subofsubcategorys  = Subsubcategory::where('is_deleted', '<>', 1)->where('category_id', $id['id'])->where('subcategory_id',$item->id)->select('sub_subcategory_name','id')->get();
                        foreach ($subofsubcategorys as $value) {
                            $out .='<li style="color:black;"><b><a href="https://demo.gisaxiom.com/sell_it_off/public/subofsubcategoryallproducts?id='; $out .=$value->id; $out.='" style="color:black;">'; $out .=$value->sub_subcategory_name; $out .='</a></b> </li>';
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

            return response()->json($out);
        }
    }
}
