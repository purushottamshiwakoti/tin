<?php

namespace App\Services\Website\Http\Controllers;

use App\Data\Models\Page;
use App\Flight;
use App\FlightDeparture;
use App\Services\Website\Features\GetFlightDetailPageFeature;
use App\Services\Website\Features\GetFlightPageFeature;
use App\Services\Website\Features\PostFlightBookingFeature;
use App\Services\Website\Features\StoreFlightBookingFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class FlightController extends Controller
{

    public function postBooking(Request $request)
    {
        return $this->serve(PostFlightBookingFeature::class);
    }


    public function booking(Request $request)
    {
        return $this->serve(StoreFlightBookingFeature::class);
    }
    public function index()
    {
        return $this->serve(GetFlightPageFeature::class);
    }

    public function detail($slug)
    {
        return $this->serve(GetFlightDetailPageFeature::class);

        $flight = Flight::where('slug', $slug)->first();
       if($flight &&$flight->category){
        $similar_packages = Flight::where('category', $flight->category)
        ->where('id', '!=', $flight->id)
        ->get();
       }
        $departure = FlightDeparture::where('flight_id', $flight->id)->get();

        return view('website::pages.flights-detail')->with(['flight' => $flight, 'similar_packages' => $similar_packages, 'departure' => $departure]);
    }
}
