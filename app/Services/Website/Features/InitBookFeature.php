<?php
namespace App\Services\Website\Features;

use App\Domains\Bookings\Jobs\ValidateBookingSessionJob;
use App\Domains\Departures\Jobs\GetSingleDepartureJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Trips\Jobs\GetSingleTripBySlugJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class InitBookFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['trip'] = $this->run(new GetSingleTripBySlugJob($request->trip));
        $data['step'] = 'first';
        $data['departure'] = $this->run(new GetSingleDepartureJob($request->departure,$data['trip']));
        if($data['departure']->size == 0 || $data['departure']->size == null )
        {
            return redirect()->route('website.home')->with(['alert-type'=>'error','message'=>'No slots left for this departure.']);
        }
        $data['booking'] = $this->run(new ValidateBookingSessionJob($data['trip'],$data['departure']));
        return $this->run(new RespondWithViewJob('website::trips.booking.create',$data));
    }
}