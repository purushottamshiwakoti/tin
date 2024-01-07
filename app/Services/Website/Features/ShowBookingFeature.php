<?php
namespace App\Services\Website\Features;

use App\Data\Models\Booking;

use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowBookingFeature extends Feature
{
    public function handle(Request $request)
    {
        $booking=Booking::where('customer_id',auth('customer')->user()->id)->count();
       $bookingList=Booking::where('customer_id',auth('customer')->user()->id)->get();
        return view('website::user.dashboard-booking',compact('booking','bookingList'));
       
    }
}
