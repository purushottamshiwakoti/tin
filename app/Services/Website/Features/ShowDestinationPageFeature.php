<?php
namespace App\Services\Website\Features;

use App\Domains\Activities\Jobs\GetActivitiyByDestinationJob;
use App\Domains\Activities\Jobs\GetAllActivitiesJob;
use App\Domains\Activities\Tests\Jobs\GetAllActivitiesJobTest;
use App\Domains\Destinations\Jobs\GetSingleDestinationBySlugJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\TravelStyles\Jobs\GetAllTravelStyleJob;
use App\Domains\Trips\Jobs\GetAllDestinationTripJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowDestinationPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['destination'] = $this->run(new GetSingleDestinationBySlugJob($request->destination));
        $data['trips'] = $this->run(new GetAllDestinationTripJob($request->destination));
        $data['metas'] = $this->run(new MakeMetasJob($data['destination']));
        $data['activities'] = $this->run(new GetActivitiyByDestinationJob($request->destination));
        $data['destinationFeatured'] = $this->run(new GetScopedTripsJob(['published','DestinationFeatured']));
        $data['activitie'] = $this->run(new GetAllActivitiesJob(['published']));
        $data['style'] = $this->run(new GetAllTravelStyleJob(['published']));
        $data['tripStyle'] = $this->run(new GetAllTravelStyleJob(['published']));

        return $this->run(new RespondWithViewJob('website::trips.destination',$data));
    }
}
