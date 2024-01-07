<?php
namespace App\Services\Website\Features;


use App\Domains\Website\Jobs\StoreFlightBookingJob;
use App\Domains\Website\Jobs\StoreHotelBookingJob;
use App\Events\Website\FlightBookingCompleted;
use App\Events\Website\HotelBookingCompleted;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreHotelBookingFeature extends Feature
{
    public function handle(Request $request)
    {
       

        $data = $request->except('_token');
        $bookData = [
            'place'=>$request->place,
            'hotel_type'=>$request->flight_type,
            'check_in_date'=>$request->check_in_date,
            'check_out_date'=>$request->check_out_date,
            'number_of_pax'=>$request->number_of_pax,
            'adult'=>$request->adult,
            'child'=>$request->child,
            'infant'=>$request->infant,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'message'=>$request->message,
         
        ];
       
        $booking = $this->run(new StoreHotelBookingJob($bookData));
        if(!$booking)
        {
            return redirect()->back()->with(['alert_type'=>'error','message'=>'Something went wrong!']);
        }

        event(new HotelBookingCompleted($booking));
        return response('Successfull');
    }

}