<?php

namespace App\Services\Website\Features;

use App\Domains\Faqs\Jobs\GetFaqPageJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Regions\Jobs\GetAllRegionsJob;
use App\Domains\Regions\Jobs\GetSingleRegionBySlugJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowRegionsFeature extends Feature
{
    public function handle(Request $request)
    {
        // dd("hello");
        $data['region'] = $this->run( GetAllRegionsJob::class);
        // dd("hello");

        // $data['metas'] = $this->run(new MakeMetasJob($data['region']));

        $data['listRegions'] = $this->run(GetAllRegionsJob::class);

        $data['faqs'] = $this->run(GetFaqPageJob::class);
        // dd($data);
        return $this->run(new RespondWithViewJob('website::trips.region-listing', $data));
        // return $this->run(new RespondWithViewJob('website::trips.region-listing', $data));

    }
}
