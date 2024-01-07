<?php
namespace App\Http\Controllers;

use App\Customer;
use App\Data\Models\Customer as ModelsCustomer;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookSignin()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            $facebookId = ModelsCustomer::where('facebook_id', $user->id)->first();
     
            if($facebookId){
                Auth::login($facebookId);
                return redirect('/');
            }else{
                $createUser = ModelsCustomer::create([
                    'full_name' => $user->full_name,
                 
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => encrypt('john123')
                ]);
    
                Auth::login($createUser);
                return redirect('/');
            }
    
        } catch (Exception $e) {
            $error=$e->getMessage();
            return view('errors.500',compact('error'));
        }
    }
}