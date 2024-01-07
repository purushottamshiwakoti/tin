<?php
namespace App\Services\Website\Features;

use App\Domains\Website\Jobs\StoreCarJob;
use App\Domains\Website\Jobs\StoreFlightBookingJob;
use App\Events\Website\FlightBookingCompleted;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreCarBookingFeature extends Feature
{
    public function handle(Request $request)
    {
       

        $data = $request->except('_token');
        $bookData = [
            'departure'=>$request->departure,
            'arrival'=>$request->arrival,
            'flight_type'=>$request->flight_type,
            'departure_date'=>$request->departure_date,
            'return_date'=>$request->return_date,
            'number_of_pax'=>$request->number_of_pax,
            'adult'=>$request->adult,
            'child'=>$request->child,
            'infant'=>$request->infant,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'message'=>$request->message,
         
        ];
       
       
        $booking = $this->run(new StoreCarJob($bookData));
        if(!$booking)
        {
            return redirect()->back()->with(['alert_type'=>'error','message'=>'Something went wrong!']);
        }
      
        event(new FlightBookingCompleted($booking));
        return response('Successfull');
    }

}