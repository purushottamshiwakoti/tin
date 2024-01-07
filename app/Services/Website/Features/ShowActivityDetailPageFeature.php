<?php
namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Data\Models\Activity;
use App\Domains\Faqs\Jobs\GetFaqPageJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Blog\Jobs\GetNepalPostJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetScopedPagesJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use App\Domains\Trips\Jobs\GetAllActivityTripJob;
use App\Domains\Activities\Jobs\GetAllActivitiesJob;
use App\Domains\TravelStyles\Jobs\GetAllTravelStyleJob;
use App\Domains\Destinations\Jobs\GetAllDestinationsJob;
use App\Domains\Activities\Jobs\GetAllPaginateActivityJob;
use App\Domains\Activities\Jobs\GetSingleActivityBySlugJob;

class ShowActivityDetailPageFeature extends Feature
{
    public function handle(Request $request)
    {
        // $data['activity'] = Activity::where('slug',$request->activity)->with('trips')->get();
        // dd($data);
        // dd($request->all());
        $data['activity'] = $this->run(new GetSingleActivityBySlugJob($request->activity));
        $data['trips'] = $this->run(new GetAllActivityTripJob($request->activity));
        $data['listActivities'] = $this->run( GetAllActivitiesJob::class);
        $data['nepalPosts'] = $this->run(new GetScopedPagesJob(['NepalHomeFeatured']));

        $data['metas'] = $this->run(new MakeMetasJob($data['activity']));
        $data['tripFeatured'] = $this->run(new GetScopedTripsJob(['published','DestinationFeatured']));
        $data['faqs'] = $this->run(new GetFaqPageJob('faq'));
        $data['destination'] = $this->run(new GetAllDestinationsJob(['published']));
        $data['style'] = $this->run(new GetAllTravelStyleJob(['published']));
        $data['tripStyle'] = $this->run(new GetAllTravelStyleJob(['published']));
        // dd($data['activity']->trips);
        return $this->run(new RespondWithViewJob('website::trips.activity',$data));
    }
}