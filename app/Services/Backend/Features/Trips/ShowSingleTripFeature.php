<?php
namespace App\Services\Backend\Features\Trips;

use App\Domains\Trips\Jobs\GetSingleTripJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowSingleTripFeature extends Feature
{
    public function handle(Request $request)
    {
        $trip = $this->run(new GetSingleTripJob($request->trip));
        return view('backend::trips.view',compact('trip'));
    }
}
