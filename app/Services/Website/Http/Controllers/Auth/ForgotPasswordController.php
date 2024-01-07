<?php

namespace App\Services\Website\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function showLinkRequestForm()
    {
        // dd('here');
        return view('website::auth.email');
    }

    public function broker()
    {
        return Password::broker('customers');
    }


    protected function guard()
    {
        return Auth::guard('customer');
    }


    // protected function validateEmail(Request $request)
    // {
    //     $validator = Validator::make($request->only('email'),['email' => 'required|email|exists:customers']);
    //     if($validator->fails())
    //     {
    //         return back()->withInput()
    //             ->withErrors($validator,'reset');
    //     }
    // }

 

//     protected function sendResetLinkResponse($response)
//     {
// //        return back()->with('status', trans($response));
//         return back()->with(['message'=>'Successfully sent reset link.','alert-type'=>'success']);
//     }

//     protected function sendResetLinkFailedResponse(Request $request, $response)
//     {
//         return back()->withInput($request->only('email'))
//             ->with(['message' => trans($response),'alert-type'=>'error']);
//     }
}
