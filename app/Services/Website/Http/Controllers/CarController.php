<?php
namespace App\Services\Website\Http\Controllers;

use App\Services\Website\Features\StoreFlightBookingFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class CarController extends Controller
{

    public function booking(Request $request)
    {
        return $this->serve(StoreFlightBookingFeature::class);
    }
    


        
}