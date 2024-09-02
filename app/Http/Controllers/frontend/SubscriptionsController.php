<?php

namespace App\Http\Controllers\frontend;

use Stripe;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use App\Mail\SubscribeMail;
use Spatie\FlareClient\Api;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
// use Illuminate\Support\Facades\Session;

use App\Models\CategoryFilter;
use App\Models\SubscriptionLog;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\backend\ProductController;

class SubscriptionsController extends Controller
{
    public function Subscription()
    {

        $user_type_category_indidual = Subscription::where('user_type', 1)->select('user_type_category')->distinct()->get();
        $user_type_category_business = Subscription::where('user_type', 2)->select('user_type_category')->distinct()->get();

        return view('frontend.subscription.subscription', compact('user_type_category_indidual', 'user_type_category_business'));
    }

    function Subscriptiontypesindividual()
    {
        $subscription = session()->get('subscription', []);
        $id = Request()->id;

        $indidual_plans  = Subscription::where('user_type', 1)->where('user_type_category', $id)->select('plan_name', 'id', 'photo_count', 'pricing_per_week','conditions')->get();

        return view('frontend.subscription.subscriptiontypes', compact('indidual_plans'));
    }

    function Subscriptiontypesbussiness()
    {

        $id = Request()->id;
        $bussiness_plans  = Subscription::where('user_type', 2)->where('user_type_category', $id)->select('plan_name', 'id','conditions','photo_count', 'pricing_per_week', 'pricing_per_month', 'price_3months', 'price_6months', 'pricing_per_yr','items')->get();

        return view('frontend.subscription.subscriptiontypesbussiness', compact('bussiness_plans'));
    }

    public  function SubscriptionPlandetails()
    {

        $plan_id         = Request()->id;
        $item_count      = Subscription::where('id', $plan_id)->pluck('items')->first();
        $subscription = session()->get('subscription', []);
        // dd($subscription);

        if (session('subscription')) {
            foreach (session('subscription') as $id => $item) {

                $sub_id = $item['id'];
            }
        }

        $bussiness_plans  = Subscription::where('user_type', 2)->where('id', $plan_id)->get();


        if (session('subscription')) {

            $subscription_id = UserSubscription::where('id', $sub_id)->pluck('subscription_id')->first();
            $cart            = Cart::where('subscription_id', $plan_id)->exists();

            if ($subscription_id != $plan_id && $cart == 0) {

                return redirect()->route('frontend.subscribed_products', ['id' => $plan_id]);
            } else if ($subscription_id == $plan_id && $cart == 0) {

                return view('frontend.subscription.subscription_plandetails', compact('bussiness_plans'));
            } else if ($subscription_id != $plan_id && $cart == 1) {

                return view('frontend.subscription.subscription_plandetails', compact('bussiness_plans'));
            }
        } else {

            return view('frontend.subscription.subscription_plandetails', compact('bussiness_plans'));
        }
    }

    public function SubscribedProducts(Request $request)
    {
        return view('frontend.subscription.subscribed_product_list');
    }

    public function Cart(Request $request)
    {
        $id          = $request->id;
        $product_ids = $request->product_ids;

        foreach ($product_ids as $item) {

            Cart::insert([

                'user_id'         => Auth::user()->id,
                'subscription_id' => $id,
                'product_id'      => $item,

            ]);
        }
        $cart  = Cart::where('subscription_id', $id)->exists();

        if ($cart == 1) {

            return redirect()->route('frontend.subscriptonplandetails', ['id' => $id]);
        }
    }

    // PAYMENT INTEGRATION - STRIPE
    public function session(Request $request)
    {

        $totalprice      = $request->get('total');
        $subscription_id = $request->get('subscription_id');
        $plan_id         = $request->get('plan_id');

        if($totalprice == 0){

            return redirect()->route('frontend.storeusersubscription', ['subscription_id' => $subscription_id, 'plan_id' => $plan_id]);

        }

        \Stripe\Stripe::setApiKey('sk_test_51Nx5u4SD5INzQig9dVBV4Vn06loY8KwIVcUa6gWrMlck7W1cSAm2XzpglEhBhL7qRuQpFQL4IhJxJGTLRXvwdzqG00mC1Li6Ys');

        $productname    = $request->get('productname');
        $totalprice     = $request->get('total');

        $subscription_id = $request->get('subscription_id');
        $plan_id        = $request->get('plan_id');

        // $two0   = "00";
        // $total  = "$totalprice$two0";
        $total   = $totalprice * 100;
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'INR',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment',
            'success_url' => route('frontend.storeusersubscription', ['subscription_id' => $subscription_id, 'plan_id' => $plan_id]),
            'cancel_url'  => route('frontend.home'),
        ]);

        return redirect()->away($session->url);
    }

    // public function success()
    // {
    //     return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    // }

    public function StoreUserSubscriptions(Request $request)
    {

        $values             = Request()->all();
        $plan_id            = $values['plan_id'];
        $subscription_id    = $values['subscription_id'];
        $created_at         = Carbon::now('Asia/Kolkata');
        $start_date         = now()->format('Y-m-d');
        $date               = Carbon::createFromFormat('Y-m-d', $start_date);
        $user_id            = Auth::user()->id;
        $product_tag        = Subscription::where('id', $subscription_id)->pluck('product_tag')->first();
        $product_id         = Product::where('is_deleted', '=', 1)->where('subscription_id', '=', 0)->orderBy('id', 'desc')->pluck('id')->first();
        $user_sub_id        = UserSubscription::where('subscription_id', $subscription_id)->pluck('id')->first();

        if ($product_tag == 1) {

            $highlight = 1;
        } else if ($product_tag == 2) {

            $urgent = 1;
        }

        if ($product_id != null) {

            Product::findOrFail($product_id)->update([

                'urgent'          => $urgent ?? 0,
                'highlight'       => $highlight ?? 0,

            ]);
        }

        $main_category_id = Subscription::where('id', $subscription_id)->pluck('user_type_category')->first();
        $item_count       = Subscription::where('id', $subscription_id)->pluck('items')->first();


        if ($plan_id == 1) {

            $daysToAdd  = 7;
            $end_date   = $date->addDays($daysToAdd);
        } else if ($plan_id == 2) {

            $daysToAdd  = 30;
            $end_date   = $date->addDays($daysToAdd);
        } else if ($plan_id == 3) {

            $daysToAdd  = 90;
            $end_date   = $date->addDays($daysToAdd);
        } else if ($plan_id == 4) {

            $daysToAdd  = 180;
            $end_date   = $date->addDays($daysToAdd);
        } else {

            $daysToAdd  = 365;
            $end_date   = $date->addDays($daysToAdd);
        }


        // SUBSCRIPTION DETAILS INSERTION

        $user_sub_id  = UserSubscription::where('user_id', Auth::user()->id)->where('subscription_id', $subscription_id)->pluck('id')->first();
        $user         = Auth::user();
        $user_plan    = $user->user_plan_type;

        if ($user_plan == 1) {

            if (session('subscription')) {

                $subscription    = session()->get('subscription', []);

                foreach (session('subscription') as $id => $item) {

                    $sub_id = $item['id'];
                }

                $parts           = explode('_', $sub_id);
                $check_plan_type = $parts[1];

                if($check_plan_type == 1){
                    $cart  = 1;
                }
            } else {
                $cart  = 0;
            }


        } else {

            $cart   = Cart::where('user_id', Auth::user()->id)->where('subscription_id', $subscription_id)->exists();
        }


        if ($user_plan == 1) {

            $is_expired = 1;
            $item_count = $item_count;
            $balance    = 0;
        } else {
            $is_expired = 0;
            $item_count = $item_count;
            $balance    = $item_count - 1;
        }

        if ($cart == 0) {

            $pid = UserSubscription::insert([

                'user_id'           => $user_id,
                'subscription_id'   => $subscription_id,
                'main_category_id'  => $main_category_id,
                'duration_id'       => $plan_id ?? 0,
                'created_at'        => $created_at,
                'start_date'        => $start_date,
                'end_date'          => $end_date,
                'item_count'        => $item_count,
                'balance'           => $balance,
                'is_expired'        => $is_expired,

            ]);
        }


        // IF CART EXISTS

        $cart_details = Cart::where('user_id', Auth::user()->id)->where('subscription_id', $subscription_id)->get();
        $product_ids  = Cart::where('user_id', Auth::user()->id)->where('subscription_id', $subscription_id)->select('product_id')->get();
        $subscription = session()->get('subscription', []);
        if (session('subscription')) {

            foreach (session('subscription') as $id => $item) {

                $sub_id = $item['id'];
            }

            $products          = Product::where('subscription_id', $sub_id)->whereNotIn('id', $product_ids)->pluck('id');
            $user_subscription = UserSubscription::where('id', $sub_id)->get();
            $product_count     = Cart::where('user_id', Auth::user()->id)->where('subscription_id', $subscription_id)->count('id');
            $new_balance       = $item_count - $product_count;
        }

        // IF INDIVIDUAL PLAN

        $user_plan_type = $user->user_plan_type;

        if ($cart == 1) {

            foreach ($user_subscription as $item) {

                SubscriptionLog::insert([

                    'user_id'           => $item->user_id,
                    'subscription_id'   => $item->subscription_id,
                    'main_category_id'  => $item->main_category_id,
                    'duration_id'       => $item->duration_id,
                    'created_at'        => $item->created_at,
                    'start_date'        => $item->start_date,
                    'end_date'          => $item->end_date,
                    'item_count'        => $item->item_count,
                    'balance'           => $item->balance,
                    'is_expired'        => $item->is_expired,
                    'new_plan_id'       => $subscription_id,

                ]);
            }

            UserSubscription::findOrFail($sub_id)->update([

                'user_id'           => $user_id,
                'subscription_id'   => $subscription_id,
                'main_category_id'  => $main_category_id,
                'duration_id'       => $plan_id ?? 0,
                'created_at'        => $created_at,
                'start_date'        => $start_date,
                'end_date'          => $end_date,
                'item_count'        => $item_count,
                'balance'           => $new_balance,
                'is_expired'        => $is_expired,


            ]);

            if ($user_plan_type == 2) {
                foreach ($products as $item) {

                    Product::findOrFail($item)->update([

                        'is_active'  => 0,

                    ]);
                }

                Cart::destroy($cart_details);
            }
        }


        $name         = Auth::user()->name;
        $email        = Auth::user()->email;
        $planname     = Subscription::where('id', $subscription_id)->pluck('plan_name')->first();
        $photocount   = Subscription::where('id', $subscription_id)->pluck('photo_count')->first();

        if ($plan_id == 1) {

            $price = Subscription::where('id', $subscription_id)->pluck('pricing_per_week')->first();
        } elseif ($plan_id == 2) {

            $price = Subscription::where('id', $subscription_id)->pluck('pricing_per_month')->first();
        } elseif ($plan_id == 3) {

            $price = Subscription::where('id', $subscription_id)->pluck('price_3months')->first();
        } elseif ($plan_id == 4) {

            $price = Subscription::where('id', $subscription_id)->pluck('price_6months')->first();
        } elseif ($plan_id == 5) {

            $price = Subscription::where('id', $subscription_id)->pluck('pricing_per_yr')->first();
        }

        Mail::to($email)->send(new SubscribeMail($name, $planname, $photocount, $price, $item_count));

        $id  = Product::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->pluck('id')->first();

        if (session('subscription')) {

            $subscription = session()->forget('subscription');

            return redirect()->route('frontend.home');

        } else {

            // $subscription = session()->forget('subscription');

            return redirect()->route('frontend.addproduct');
        }


    }

    public function UserSubscriptions()
    {

        $user_subscriptions  = UserSubscription::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();

        return view('frontend.subscription.user_subscriptions', compact('user_subscriptions'));
    }

    public function Renew(Request $request)
    {

        $user            = Auth::user();
        $user_plan_type  = $user->user_plan_type;
        $subscription    = session()->get('subscription', []);
        $subscription_id = $request->id;
        $business_sub_id = UserSubscription::where('id',$subscription_id)->pluck('subscription_id')->first();
        $business_cat_id = Subscription::where('id',$business_sub_id)->pluck('user_type_category')->first();

        if ($user_plan_type == 1) {

            $parts = explode('_', $subscription_id);
            $sub_id   = $parts[0];

            $user_sub_id         = UserSubscription::where('id',$sub_id)->pluck('subscription_id')->first();
            $individual_cat_id   = Subscription::where('id',$user_sub_id)->pluck('user_type_category')->first();

            $subscription[$sub_id] = [

                "id" => $subscription_id,
            ];

            session()->put('subscription', $subscription);

        } else {

            $subscription[$subscription_id] = [

                "id" => $subscription_id,
            ];
            session()->put('subscription', $subscription);

        }

        if ($user_plan_type == 1) {

            return redirect()->route('frontend.subscriptonplantypes', ['id' => $individual_cat_id]);
        } else {

            return redirect()->route('frontend.subscriptonplantypesbussiness', ['id' => $business_cat_id]);
        }
    }
}
