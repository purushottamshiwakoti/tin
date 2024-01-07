<?php

namespace App\Services\Website\Http\Controllers\Auth;

use App\Data\Models\Customer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jrean\UserVerification\Exceptions\TokenMismatchException;
use Jrean\UserVerification\Exceptions\UserIsVerifiedException;
use Jrean\UserVerification\Exceptions\UserNotFoundException;
use Jrean\UserVerification\Facades\UserVerification;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    protected $userTable = 'customers';
    use RegistersUsers, VerifiesUsers;

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
        $this->middleware('guest',['except' => ['getVerification', 'getVerificationError']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:customers,email',
            'password' => 'required|min:8|confirmed',
        ]);
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all())->validate();
        // if($validator->fails())
        // {            
        //     return redirect()->back()
        //         ->withInput()
        //         ->withErrors($validator,'register');
        // }

        try
        {
            event(new Registered($user = $this->create($request->all())));
            UserVerification::generate($user);
            UserVerification::send($user);
        } catch (Exception $exception){
            return redirect()->back()->with(['alert-type'=>"error",'message'=>'Something went wrong.Please try again later.']);
        }


        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
        // event(new Registered($user = $this->create($request->all())));
        // UserVerification::generate($user);
        // UserVerification::send($user);

        // return redirect()->back()->with(['message'=>'Registration Successfully.','alert-type'=>'success']);
        // return $this->registered($request, $user)->with(['message'=>'Register in successfully.','alert-type'=>'success'])
        //     ?: redirect($this->redirectPath())>with(['message'=>'Register in successfully.','alert-type'=>'success']);
            
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Customer::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function showRegistrationForm()
    {
        return view('website::auth.register');
        // return redirect('/');
    }

    /**
     * @param Request $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function registered(Request $request, $user)
    {
        return redirect()->route('website.login')->with(['message'=>'Account created. Please check your email and verify.','alert-type'=>'success','page'=>'signup']);
    }

    /**
     * @param Request $request
     * @param $token
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function getVerification(Request $request, $token)
    {
        if (! $this->validateRequest($request)) {
            return $this->redirectIfVerificationFails();
        }

        try {
            $user = UserVerification::process($request->input('email'), $token, $this->userTable());
        } catch (UserNotFoundException $e) {
            return $this->redirectIfVerificationFails();
        } catch (UserIsVerifiedException $e) {
            return $this->redirectIfVerified();
        } catch (TokenMismatchException $e) {
            return $this->redirectIfVerificationFails();
        }

        if (config('user-verification.auto-login') === true) {
            auth()->loginUsingId($user->id);
        }

        return $this->redirectAfterVerification();
    }
    public function redirectAfterVerification()
    {
        return redirect('/')->with(['message'=>'Account Verified. Please Login to continue!!','alert-type'=>'success']);
    }

    public function redirectIfVerified()
    {
        return redirect('/')->with(['message'=>'Account Already Verified. Please Login to continue!!','alert-type'=>'success']);
    }

    /**
     * Get the redirect path for a failing token verification.
     *
     * @return string
     */
    public function redirectIfVerificationFails()
    {
        return redirect('/')->with(['message'=>'Could not verify account','alert-type'=>'error']);
    }
}