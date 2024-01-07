<?php
namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowSuccessPageFeature extends Feature
{
    public function handle(Request $request)
    {

        if(!session()->has('booking_success'))
        {
            return redirect('/');
        }
        return view('website::trips.booking.success')->with('page_name','booking_success');
    }
}
