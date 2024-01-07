<?php
namespace App\Services\Website\Features;


use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowSettingFeature extends Feature
{
    public function handle(Request $request)
    {
        $user = Auth::guard('customer')->user();
       
        return view('website::user.dashboard-settings',compact('user'));
    }
}
