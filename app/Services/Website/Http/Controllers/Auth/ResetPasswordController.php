<?php

namespace App\Services\Website\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;



class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function showResetForm(Request $request, $token = null)
    {
       
        return view('website::auth.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // protected function sendResetResponse($response)
    // {
    //     return redirect()->to('/')->with(['message'=>'Successfully changed password','alert-type'=>'success']);

    // }

    // protected function sendResetFailedResponse(Request $request, $response)
    // {
    //     return redirect()->back()
    //         ->withInput($request->only('email'))
    //         ->with(['message' => trans($response),'alert-type'=>'error']);
    // }


    public function broker()
    {
        return Password::broker('customers');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }
}