<?php
namespace App\Services\Website\Features;

use App\Domains\Bookings\Jobs\GetSingleBookingJob;
use App\Domains\Bookings\Jobs\ValidateUpdateBookingSessionJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Events\Website\BookingCompleted;
use Illuminate\Support\Facades\Crypt;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowBookingReviewFeature extends Feature
{
    public function handle(Request $request)
    {
        $booking_id = Crypt::decrypt($request->booking);
        $this->run(new ValidateUpdateBookingSessionJob($booking_id));
        $data['booking'] = $this->run(new GetSingleBookingJob($booking_id));
        $data['trip'] = $data['booking']->trip;
        $data['step'] = 'third';
        $data['departure'] = $data['booking']->departure;
        if($data['booking']->status!='incomplete')
        {
            return redirect('/')->with(['message'=>'Already Completed','alert-type'=>'error']);
        }
        return $this->run(new RespondWithViewJob('website::trips.booking.review',$data));
    }
}
