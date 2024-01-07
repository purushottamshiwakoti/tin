<?php
namespace App\Services\Website\Features;

use App\Data\Models\Customer;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordFeature extends Feature
{
    public function handle(Request $request)
    {
    //    dd($request->all());

        $request->validate([
            'current-password' => 'required|min:6|max:255',
            'password' => 'required|min:6|confirmed'
        ]);

       $data = $request->except('_token');

       $user = Auth::guard('customer')->user();

       if (Hash::check($data['current-password'], $user->getAuthPassword())) {

           if (Hash::check($data['password'], $user->getAuthPassword())) {

            return redirect()->back()->with(['message'=>'You cannot set your old password as a new Password','alert-type'=>'failed']);

           } else {
               $password['password'] = Hash::make($data['password']);

               $user = Customer::where('id', $user->id)
                   ->update(['password' => $password['password']]);
               if ($user) {
                return redirect()->back()->with(['message'=>'Password  Change Successful !.','alert-type'=>'success']);
                  
               } else {
                return redirect()->back()->with(['message'=>'Something went wrong.','alert-type'=>'failed']);

                  
               }
           }
       } else {
        return redirect()->back()->with(['message'=>'Current Password Does Not Match!!','alert-type'=>'failed']);

       }
       
       
    }
}
