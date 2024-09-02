<?php

namespace App\Http\Controllers\backend;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function AllSubscription()
    {
        // dd(Request()->all());
        $categories = Subscription::where('is_deleted','<>', 1)->get();
        return view('backend.subscription.all_subscription', compact('categories'));
    }

    public function AddSubscription()
    {
        return view('backend.subscription.add_subscription');
    }

    public function StoreSubscription(Request $request)
    {


        Subscription::insert([

            'user_type'              => $request->user_type,
            'user_type_category'     => $request->user_type_category,
            'plan_name'              => $request->plan_name,
            'photo_count'            => $request->photo_count,
            'pricing_per_week'       => $request->pricing_per_week ?? 0, 
            'pricing_per_month'      => $request->pricing_per_month ?? 0,
            'price_3months'          => $request->price_3months ?? 0,
            'price_6months'          => $request->price_6months ?? 0 ,
            'pricing_per_yr'         => $request->pricing_per_yr ?? 0,
            'items'                  => $request->items,
            'is_active'              => $request->is_active,
        ]);

        
        return redirect()->route('subscription.all')->with('success', 'New Subscription added' );
    }

    public function EditSubscription(Request $request)
    {
        $id        = $request->id;
        $subscription  = Subscription::findOrFail($id);

        return view('backend.subscription.edit_subscription', compact('subscription'));
    }

    public function UpdateSubscription(Request $request, $id)
    {
        $id            = $request->id;
        $subscription  = Subscription::findOrFail($id);

        Subscription::findOrFail($id)->update([

            'user_type'              => $request->user_type,
            'user_type_category'     => $request->user_type_category,
            'plan_name'              => $request->plan_name,
            'photo_count'            => $request->photo_count,
            'pricing_per_week'       => $request->pricing_per_week,
            'pricing_per_month'      => $request->pricing_per_month,
            'price_3months'          => $request->price_3months,
            'price_6months'          => $request->price_6months,
            'pricing_per_yr'         => $request->pricing_per_yr,
            'items'                  => $request->items,
            'is_active'              => $request->is_active,
        ]);

        return redirect()->route('subscription.all')->with('success', 'Subscription updated' );
    }

    public function DeleteSubscription($id)
    {
        Subscription::findOrFail($id)->update([

            'is_deleted'     => 1,
        ]);
        return redirect()->back()->with('success', 'Subscription Removed' );
    }

    public function UserSubscription() {
        $usersubscription = UserSubscription::all();
        return view('backend.subscription.usersubscription',compact('usersubscription'));
    }
}
