<?php
namespace App\Services\Website\Features;

use App\Domains\Activities\Jobs\GetAllActivitiesJob;
use App\Domains\Activities\Jobs\GetAllPaginateActivityJob;
use App\Domains\Activities\Jobs\GetSingleActivityBySlugJob;
use App\Domains\Destinations\Jobs\GetAllDestinationsJob;
use App\Domains\Destinations\Jobs\GetSingleDestinationBySlugJob;
use App\Domains\Destinations\Jobs\GetSingleDestinationJob;
use App\Domains\Faqs\Jobs\GetFaqPageJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\TravelStyles\Jobs\GetAllTravelStyleJob;
use App\Domains\Trips\Jobs\GetAllActivityTripJob;
use App\Domains\Trips\Jobs\GetAllDestinationActivityTripJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowDestinationActivityDetailPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['country'] = $this->run(new GetSingleDestinationBySlugJob($request->destination));
        $data['activity'] = $this->run(new GetSingleActivityBySlugJob($request->activity));
        $data['trips'] = $this->run(new GetAllDestinationActivityTripJob($request->destination,$request->activity));
     
        $data['metas'] = $this->run(new MakeMetasJob($data['activity']));
        $data['tripFeatured'] = $this->run(new GetScopedTripsJob(['published','DestinationFeatured']));
        $data['faqs'] = $this->run(new GetFaqPageJob('faq'));
        $data['destination'] = $this->run(new GetAllDestinationsJob(['published']));
        $data['style'] = $this->run(new GetAllTravelStyleJob(['published']));
        $data['tripStyle'] = $this->run(new GetAllTravelStyleJob(['published']));


        return $this->run(new RespondWithViewJob('website::trips.activity',$data));
    }
}