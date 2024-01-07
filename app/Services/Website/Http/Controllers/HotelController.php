<?php
namespace App\Services\Website\Http\Controllers;

use App\Services\Website\Features\StoreFlightBookingFeature;
use App\Services\Website\Features\StoreHotelBookingFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class HotelController extends Controller
{

    


    public function booking(Request $request)
    {
        return $this->serve(StoreHotelBookingFeature::class);
    }
}