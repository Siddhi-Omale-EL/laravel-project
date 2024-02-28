<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signIn(){
        return view('signIn');
    }
    public function login(){
        return view('signup');
    }
    public function store(Request $request){
        $user = User::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)

            ],

        );
        return redirect()->back();
    }
    function check(Request $request)
    {
        //Validate requests
       // $request->validated();
        $userInfo = User::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {

            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                // dd($userInfo);
                Auth::guard('web')->login($userInfo, true);
                return redirect()->route('home');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }
    public function forgetPassword(){

        return view('forgetPsw');

    }
    public function otp(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', '=', $request->email)->first();

        if (!$user) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {

            $otp = mt_rand(1000, 9999);
            $user->otp = $otp;
            // $user->otp = now()->addSeconds(30);
            $user->save();
            return back()->with('success', 'Otp has been sent');
        }
    }
    public function otpCheck(Request $request){
        $userInfo = User::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {

            //check password
            if (Hash::check( $request->input('otp{{$i}}'), $userInfo->otp)) {
                // dd($userInfo);
                Auth::guard('web')->login($userInfo, true);
                return redirect()->route('home');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }
}
