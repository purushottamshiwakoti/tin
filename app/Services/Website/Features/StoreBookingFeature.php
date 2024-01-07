<?php
namespace App\Services\Website\Features;

use App\Domains\Customers\Jobs\CreateCustomerJob;
use App\Domains\Trips\Jobs\GetSingleTripBySlugJob;
use App\Domains\Trips\Jobs\GetSingleTripJob;
use App\Domains\Website\Jobs\StoreBookingJob;
use App\Services\Website\Http\Requests\StorePassengersRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreBookingFeature extends Feature
{
    public function handle(Request $request)
    {
       
        $trip = $this->run(new GetSingleTripJob($request->id));
        // print_r($trip);exit;
        // dd($trip->id);

        $user_id = optional(Auth::user())->id;
        if(!Auth::check())
        {
            $customer = $this->run(new CreateCustomerJob($request->all()));
            // print_r($customer);exit;
            $user_id = $customer->id;
        }

        $data = $request->except('_token');
        $bookData = [
            'customer_id'=>$user_id,
            'trip_id'=>$trip->id,
            'trip_name'=>$trip->title,
            'passenger_count'=>$request->passenger_count,
            'ip'=>$request->ip(),
            'hotel_category'=>$request->hotel_category,
            'tour_starting'=>$request->tour_starting,
            'estimated_day'=>$request->estimated_day,
            'special_request'=>$request->special_request,
            'start_date'=>$request->start_date,
            'finish_date'=>$request->finish_date,
        ];
        // $bookData = array_merge($data,$info);
        $booking = $this->run(new StoreBookingJob($bookData));
        if(!$booking)
        {
            return redirect()->back()->with(['alert_type'=>'error','message'=>'Something went wrong!']);
        }
        $data['booking_id'] = $booking->id;
        session(['booking_data'=>$data]);

        // return redirect()->route('website.booking.features',['booking'=>Crypt::encrypt($booking->id)]);
        return response('Successfull');
    }

}
