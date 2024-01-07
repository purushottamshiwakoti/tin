<?php

namespace App\Services\Website\Features;

use App\Domains\Faqs\Jobs\GetFaqPageJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Regions\Jobs\GetAllRegionsJob;
use App\Domains\Regions\Jobs\GetSingleRegionBySlugJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowRegionDetailPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['region'] = $this->run(new GetSingleRegionBySlugJob($request->region));
        $data['metas'] = $this->run(new MakeMetasJob($data['region']));
        $data['listRegions'] = $this->run(GetAllRegionsJob::class);
        $data['faqs'] = $this->run(GetFaqPageJob::class);
        return $this->run(new RespondWithViewJob('website::trips.region', $data));
    }
}
