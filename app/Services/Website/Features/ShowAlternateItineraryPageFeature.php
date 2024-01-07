<?php
namespace App\Services\Website\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Trips\Jobs\GetSingleTripBySlugJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowAlternateItineraryPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['trip'] = $this->run(new GetSingleTripBySlugJob($request->trip));
        $data['metas'] = $this->run(new MakeMetasJob($data['trip']));
        return $this->run(new RespondWithViewJob('website::trips.alternate-itinerary',$data));
    }
}
