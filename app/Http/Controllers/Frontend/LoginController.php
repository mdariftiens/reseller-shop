<?php


namespace App\Http\Controllers\Frontend;

use App\Abstracts\Http\FrontendController as FrontController;
use App\Http\Requests\Frontend\LoginVerifyRequest;
use App\Http\Requests\Frontend\SendOTPRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends FrontController
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show()
    {
        if( Auth::check() ){
            return redirect()->route('backend.home');
        }
        return view('auth.login');
    }

    public function sendOTP(SendOTPRequest $request)
    {

    }

    public function verify(LoginVerifyRequest $request)
    {
        $user = User::where('mobile',$request->mobile_number)->first();

        if ( $user ){
            Auth::loginUsingId($user->id);
            return redirect()->route('backend.home');
        }

        flash('Mobile number not found');

        return back();

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
