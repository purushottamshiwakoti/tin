<?php
namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowWishListFeature extends Feature
{
    public function handle(Request $request)
    {
        return view('website::user.dashboard-wishlist');
    }
}
