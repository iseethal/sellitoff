<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function View()
    {
        $categories         = Category::where('is_deleted','<>', 1)->count();
        $subcategories      = Subcategory::where('is_deleted', '<>', 1)->count();
        $sub_subcategories  = Subsubcategory::where('is_deleted', '<>', 1)->count();
        $products           = Product::where('is_deleted', '<>', 1)->count();
        return view('backend.dashboard',compact('categories','subcategories','sub_subcategories','products'));
    }

    public function LoginView()
    {
        return view('backend.login');
    }

    public function Login(Request $request)
    {
        // dd($request->all());

        $user = Admin::where('user_name', $request->user_name)->where('status', '<>', 2)->exists();

        if ($user == 1) {

            $user_result = Admin::where('user_name', $request->user_name)->first();

            $decrypt_password = Crypt::decrypt($user_result->password);

            if ($request->password != $decrypt_password) {

                return back()->with('error', 'Invalid Email Or Password');
            } else {

                $request->session()->put('user', $user_result);

                return redirect()->route('admin.admin-dashboard')->with('error', 'Login Successfully');
            }
        } else {
            return back()->with('error', 'User does not exist');
        }
    }


    public function Register()
    {
        return view('admin.register');
    }

    public function Store(Request $request)
    {
        Admin::insert([

            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'role'       => 0,
            'user_name'  => $request->user_name,
            'password'   => Crypt::encrypt($request->password),
            'status'     => 1,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function Logout(Request $request)
    {
        Session::flush();
        return redirect()->route('login.view')->with('error', 'Logout Successfully');
    }

}
