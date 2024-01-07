<?php
namespace App\Services\Website\Features;

use App\Domains\Bookings\Jobs\GetSingleBookingJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use Illuminate\Support\Facades\Crypt;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowBookingCreateFeaturesPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $booking_id = Crypt::decrypt($request->booking);
        $data['booking'] = $this->run(new GetSingleBookingJob($booking_id));
        $data['trip'] = $data['booking']->trip;
        $data['step'] = 'second';
        $data['departure'] = $data['booking']->departure;
        if($data['booking']->status!='incomplete')
        {
            return redirect('/')->with(['message'=>'Already Completed','alert-type'=>'error']);
        }
        $data['extensions'] = $this->run(new GetScopedTripsJob(['Extension']));
        if(!$data['departure'])
        {
            return redirect()->route('website.booking.review',['booking'=>Crypt::encrypt($data['booking']->id)]);
        }
        // dd($data);

        return $this->run(new RespondWithViewJob('website::trips.booking.features', $data));
    }
}