<?php

namespace App\Services\Website\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('website::auth.login');
    }


    protected function authenticated(Request $request, $user)
    {
        $request->session()->flash('check-wishlist',true);
        return redirect()->intended(route('website.home'))->with(['message'=>'Logged in successfully.','alert-type'=>'success']);
    }


    protected function guard()
    {
        return Auth::guard('customer');
    }

    protected function validateLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ])->validate();       
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput()
            ->withErrors([$this->username()=>[trans('auth.failed')]],'login')
            ->with(['message'=>'These credentials do not match our records','alert-type'=>'error']);
    }
}
