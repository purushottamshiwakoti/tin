<?php
namespace App\Services\Website\Features;

use App\Domains\Customers\Jobs\CreateCustomerJob;
use App\Domains\Departures\Jobs\GetSingleDepartureJob;
use App\Domains\Trips\Jobs\GetSingleTripBySlugJob;
use App\Domains\Website\Jobs\StoreBookingJob;
use App\Services\Website\Http\Requests\StorePassengersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreBookingSessionFeature extends Feature
{
    public function handle(StorePassengersRequest $request)
    {
        // dd($request->all());
        $trip = $this->run(new GetSingleTripBySlugJob($request->trip));
        $user_id = optional(Auth::user())->id;
        if(!Auth::check())
        {
            $customer = $this->run(new CreateCustomerJob($request->get('passengers')[0]));
            $user_id = $customer->id;
            Auth::login($customer);
        }

        $departure = $this->run(new GetSingleDepartureJob($request->departure,$trip));
        $data = $request->except('_token');
        $passengers = $request->get('passengers');
        $info = [
            'customer_id'=>$user_id,
            'trip_id'=>$trip->id,
            'trip_name'=>$trip->title,
            'departure_id'=>$departure->id,
            'passenger_count'=>count($passengers),
            'ip'=>$request->ip()
        ];
        $bookData = array_merge($data,$info);
        $booking = $this->run(new StoreBookingJob($bookData));
        if(!$booking)
        {
            return redirect()->back()->with(['alert_type'=>'error','message'=>'Something went wrong!']);
        }
        $data['booking_id'] = $booking->id;
        session(['booking_data'=>$data]);
//        return redirect()->route('website.booking.features',['trip'=>$trip->slug,'departure'=>$departure->id]);
        return redirect()->route('website.booking.features',['booking'=>Crypt::encrypt($booking->id)]);
    }
}