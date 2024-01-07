<?php


namespace App\Services\Website\ViewComposers;


use App\Data\Models\FavouriteTour;
use Illuminate\View\View;

class UserDashboardViewComposer
{

    public function compose(View $view)
    {
        $view->with('wishlist',FavouriteTour::where('customer_id',auth()->user()->id)->get());
    }
}