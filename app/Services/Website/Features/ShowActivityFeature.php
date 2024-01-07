<?php

namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Faqs\Jobs\GetFaqPageJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Regions\Jobs\GetAllRegionsJob;
use App\Domains\Activities\Jobs\GetAllActivitiesJob;
use App\Domains\Regions\Jobs\GetSingleRegionBySlugJob;

class ShowActivityFeature extends Feature
{
    public function handle(Request $request)
    {
        // dd("hello");
        $data['activity'] = $this->run( GetAllActivitiesJob::class);

        // $data['metas'] = $this->run(new MakeMetasJob($data['region']));


        $data['faqs'] = $this->run(GetFaqPageJob::class);
        // dd($data);
        return $this->run(new RespondWithViewJob('website::activities.activity', $data));
        // return $this->run(new RespondWithViewJob('website::trips.region-listing', $data));

    }
}
