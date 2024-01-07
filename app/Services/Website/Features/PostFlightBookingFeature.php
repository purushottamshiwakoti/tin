<?php
namespace App\Services\Website\Features;

use App\Data\Repositories\Contracts\FlightBookingInterface;
use App\Data\Traits\RepoStoresTrait;
use App\Domains\Backend\Jobs\StoreRepositoryJob;
use App\Domains\Notifications\Jobs\StoreNotificationJob;
use App\Services\Website\Http\Requests\StoreFlightBookingRequest;
use App\Events\Website\FlightBookingCompleted;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class PostFlightBookingFeature extends Feature
{
    use RepoStoresTrait;
    public $redirectUrl = '';
    public function handle(StoreFlightBookingRequest $request,FlightBookingInterface $flightBooking)
    {
        
        $data = $request->except('_token');
        $booking = $this->run(new StoreRepositoryJob($flightBooking,$data));
        if(!$booking)
        {
            $response = ['message'=>'Something went wrong!!','alert-type'=>'error'];
            return redirect()->route('website.home')->with($response);
        }else{
            $this->run(new StoreNotificationJob('Flight Booking','Flight booking request for '.$booking->departure.'-'.$booking->arrival.' '.$booking->departure_date,'flight-bookings/'.$booking->id));

            event(new FlightBookingCompleted($booking));
            $response = ['message'=>'Successfully posted for moderation.','alert-type'=>'success'];
            return redirect()->route('website.home')->with($response);
        }
        // return new JsonResponse($response);
    }
}
