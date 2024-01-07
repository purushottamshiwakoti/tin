<?php



namespace App\Http\Controllers;

use App\Customer;
use App\Data\Models\Customer as ModelsCustomer;
use App\Http\Controllers\Controller;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;

use Exception;




class GoogleController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */


    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();
    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleGoogleCallback()

    {
        try {
            $user = Socialite::driver('google')
                ->stateless()

                ->user();
            $googleId = ModelsCustomer::where('google_id', $user->id)->first();
            if ($googleId) {
                $this->guard()->attempt(['email' => $googleId->email, 'password' => '123456dummy']);
                return redirect('/');
            } else {
                $newUser = ModelsCustomer::create([
                    'full_name' => $user->user['given_name'],
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => bcrypt('123456dummy')
                ]);
                $this->guard()->attempt(['email' => $newUser->email, 'password' => '123456dummy']);

                return redirect('/');
            }
        } catch (Exception $e) {
            $error=$e->getMessage();
            return view('errors.500',compact('error'));
        }
    }
}