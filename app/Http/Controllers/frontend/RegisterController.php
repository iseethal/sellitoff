<?php

namespace App\Http\Controllers\frontend;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function Register()
    {
        return view('frontend.register');
    }
    public function StoreRegister(Request $request)
    {

        // $request->validate([
        //     'name' => 'required|string|max:250|unique:sellers',
        //     'email' => 'required|email|max:250|unique:sellers',
        //     'password' => 'required|min:8|confirmed'
        // ]);

        $password         =  $request->password;
        $confirmpassword  =  $request->confirmpassword;

        if($password == $confirmpassword) {
       
        Seller::insert([

            'name'            =>  $request->name,
            'email'           =>  $request->email,
            'password'        =>  Crypt::encrypt($request->password),
            
        ]);
    }
        return redirect()->route('frontend.loginview');
        // }
    }

    public function loginview(Request $request)
    {
        return view('frontend.login');
    }
    public function Login(Request $request)
    {
        $seller = Seller::where('name', $request->name)->exists();
        // dd($seller);

        if ($seller == 1) {

            $seller_result = Seller::where('name', $request->name)->first();

            $decrypt_password = Crypt::decrypt($seller_result->password);

            if ($request->password != $decrypt_password) {

                return back()->with('error', 'Invalid Email Or Password');
            } else {

                $request->session()->put('user', $seller_result);

                return redirect()->route('frontend.home')->with('error', 'Login Successfully');
            }
        } else {
            return back()->with('error', 'User does not exist');
        }


        // $name         = $request->name;
        // $password     = $request->password;

        // $user_result = Seller::where('name', $request->name)->exist();
        // $decrypt_password = decrypt($user_result->password);
        // $seller_exist = Seller::where('name', $name)->where('password',$decrypt_password)->exists();

        // if ($seller_exist == 1) {

        //     $request->session()->put('seller', $name);
        //     $data = $request->session()->get('seller');
        //     return redirect()->route('frontend.home');
        // }
        // else {

        //     return redirect()->route('frontend.loginview');

        // }  
    }

    public function Logout(Request $request)
    {
        Session::flush();
        return redirect()->route('frontend.loginview');
    }

}
