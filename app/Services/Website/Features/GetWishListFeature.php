<?php
namespace App\Services\Website\Features;

use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Trips\Jobs\GetTripsByIdsJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class GetWishListFeature extends Feature
{
    public function handle(Request $request)
    {

        $trips = $this->run(new GetTripsByIdsJob($request->trip_ids)); 
        return $this->run(new RespondWithJsonJob($trips));
    }
}
