<?php

namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use App\Data\Models\Page;
use Illuminate\Http\Request;
use App\Domains\Faqs\Jobs\GetFaqPageJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Trips\Jobs\GetAllTripJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Regions\Jobs\GetAllRegionsJob;
use App\Domains\Activities\Jobs\GetAllActivitiesJob;
use App\Domains\Regions\Jobs\GetSingleRegionBySlugJob;
use App\Domains\Destinations\Jobs\GetAllDestinationsJob;
use App\Domains\Destinations\Jobs\GetSingleDestinationJob;
use App\Domains\Destinations\Jobs\DatatablePaginateDestinationsJob;
use App\Domains\Destinations\Jobs\GetAllDestinationsByPaginationJob;

class ShowDestinationFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['destination'] = $this->run(new GetAllDestinationsByPaginationJob());
        // dd(gettype($data['destination']['data'][0]));
        $data['faqs'] = $this->run(GetFaqPageJob::class);
        $data['page']=Page::where('slug', 'destinations')->first();
        // $data['page'];
        // dd($data['destination']);
        return $this->run(new RespondWithViewJob('website::destinations.destination', $data));
        // return $this->run(new RespondWithViewJob('website::trips.region-listing', $data));

    }
}
