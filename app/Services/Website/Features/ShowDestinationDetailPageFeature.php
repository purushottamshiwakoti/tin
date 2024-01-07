<?php

namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Data\Models\Destination;
use App\Domains\Faqs\Jobs\GetFaqPageJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Regions\Jobs\GetAllRegionsJob;
use App\Domains\Regions\Jobs\GetSingleRegionBySlugJob;

class ShowDestinationDetailPageFeature extends Feature
{
    public function handle(Request $request,$slug)
    {
        dd($request->all());
        $data['destination']=Destination::get();
        // dd($data['destination']);
        // $data['region'] = $this->run(new GetSingleRegionBySlugJob($request->region));
        // $data['region'] = $this->run(new GetSingleRegionBySlugJob($request->region));
        // $data['metas'] = $this->run(new MakeMetasJob($data['region']));
        // $data['listRegions'] = $this->run(GetAllRegionsJob::class);
        $data['faqs'] = $this->run(GetFaqPageJob::class);
        dd($data['destination']);
        return $this->run(new RespondWithViewJob('website::destinations.destination-detail', $data));
    }
}
