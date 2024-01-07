<?php
namespace App\Services\Backend\Features\Destinations;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Trips\Jobs\GetAllTripJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Regions\Jobs\GetAllRegionsJob;
use App\Domains\Activities\Jobs\GetAllActivitiesJob;
use App\Domains\Destinations\Jobs\GetSingleDestinationJob;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowDestinationEditAddFeature extends Feature
{
    public function handle(Request $request)
    {   
        // dd($request->destination);
        $data = [];
        $data['destination'] = null;
        if($destinationId = $request->destination)
        {
             if(!$data['destination'] = $this->run(new GetSingleDestinationJob($destinationId)))
             {
                 throw new NotFoundHttpException();
             }
             $data['selectedActivity']= $data['destination']->activities()->pluck('activity_id');
             $data['selectedRegion']= $data['destination']->regions()->pluck('region_id');
             $data['selectedTrip']= $data['destination']->destinationTrip()->pluck('trip_id');
        }
    
        $data['regions'] = $this->run(new GetAllRegionsJob());
        $data['trips']= $this->run(new GetAllTripJob());
        $data['activities'] = $this->run(new GetAllActivitiesJob());      
       
        // dd($data);
        return $this->run(new RespondWithViewJob('backend::destinations.edit-add',$data));

    }
}
