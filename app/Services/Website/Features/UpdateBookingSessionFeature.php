<?php
namespace App\Services\Website\Features;

use App\Domains\Customers\Jobs\CreateCustomerJob;
use App\Domains\Website\Jobs\UpdateBookingJob;
use App\Services\Website\Http\Requests\StorePassengersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateBookingSessionFeature extends Feature
{
    public function handle(StorePassengersRequest $request)
    {

        $id = Crypt::decrypt($request->booking);

        $passengers = $request->get('passengers');
        $user_id = optional(Auth::user())->id;
        if(!Auth::check())
        {
            $customer = $this->run(new CreateCustomerJob($request->get('passengers')[0]));
            $user_id = $customer->id;
        }
        $data = [
            'customer_id'=>$user_id,
            'passenger_count'=>count($passengers),
            'passengers'=>$passengers
        ];
        $booking = $this->run(new UpdateBookingJob($id,$data));
        if(!$booking)
        {
            return redirect()->back()->with(['message'=>'Something went wrong!','alert_type'=>'error']);
        }

        return redirect()->route('website.booking.features',['booking'=>Crypt::encrypt($booking->id)]);
    }
}
