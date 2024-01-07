<?php
namespace App\Services\Backend\Features\Regions;

use App\Domains\Activities\Jobs\GetAllActivitiesJob;
use App\Domains\Activities\Jobs\GetSingleActivityJob;
use App\Domains\Destinations\Jobs\GetAllDestinationsJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Regions\Jobs\GetRegionPublishOptionsJob;
use App\Domains\Regions\Jobs\GetSingleRegionJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowRegionEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['region'] = null;
        $data['destinations'] = $this->run(GetAllDestinationsJob::class);
        $data['activities'] = $this->run(GetAllActivitiesJob::class);
        $data['region_options'] = $this->run(GetRegionPublishOptionsJob::class);
        if($regionId = $request->region)
        {
             if(!$data['region'] = $this->run(new GetSingleRegionJob($regionId)))
             {
                 throw new NotFoundHttpException();
             }
        }
        return $this->run(new RespondWithViewJob('backend::regions.edit-add',$data));
    }
}
