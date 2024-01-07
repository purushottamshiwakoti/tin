<?php
namespace App\Services\Website\Features;


use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowProfileFeature extends Feature
{
    public function handle(Request $request)
    {
        
       
        return view('website::user.dashboard-profile');
    }
}
