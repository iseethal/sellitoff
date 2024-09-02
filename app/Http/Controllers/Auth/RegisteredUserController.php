<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $check_data = User::where('email',$request->email)->where('user_type',$request->user_type)->exists();
        if($check_data == 1){

            $request->validate([
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            ]);

             return redirect()->route('register');


        }else {

            $name                  = $request->name;
            $sur_name              = $request->sur_name;
            $email                 = $request->email;
            $phone                 = $request->phone;
            $password              = $request->password;
            $user_type             = $request->user_type;
            $password_confirmation = $request->password_confirmation;
            $user_plan_type        = $request->user_plan_type;


        $otp    = rand(1,1000000);
        Mail::to($request->email)->send(new VerificationMail($name,$otp));

        return view('auth.otpregister',compact('otp','name','sur_name','email','phone','password','user_type','password_confirmation','user_plan_type','phone'));
        }

    }

    public function otpstore(request $request) {


         $code     = $request->code;
         $mailotp  =  $request->otp;

        if($code == $mailotp) {

             $user = User::create([

            'name'      => $request->name,
            'sur_name'  => $request->sur_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
            'user_type' => $request->user_type,
            'user_plan_type' => $request->user_plan_type,
            'show_mobile'  => 1,


        ]);

        event(new Registered($user));

        Auth::login($user);

            return redirect(RouteServiceProvider::HOME);

        }

        else {

            return redirect()->back();

        }

    }
}
