<?php
namespace App\Services\Backend\Features\Trips;

use App\Domains\Activities\Jobs\GetAllActivitiesJob;
use App\Domains\Activities\Jobs\GetSingleActivityJob;
use App\Domains\Destinations\Jobs\GetAllDestinationsJob;
use App\Domains\ExtraValues\Jobs\GetTripNoteKeysJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Regions\Jobs\GetAllRegionsJob;
use App\Domains\Regions\Jobs\GetSingleRegionJob;
use App\Domains\TravelStyles\Jobs\GetAllTravelStyleJob;
use App\Domains\Trips\Jobs\GetDepartureAvailabilityJob;
use App\Domains\Trips\Jobs\GetSingleTripJob;
use App\Domains\Trips\Jobs\GetTripsPublishOptionsJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowTripEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['trip'] = null;
        $data['destinations'] = $this->run(GetAllDestinationsJob::class);
        $data['activities'] = $this->run(GetAllActivitiesJob::class);
        $data['travelstyle'] = $this->run(GetAllTravelStyleJob::class);
        $data['regions'] = $this->run(GetAllRegionsJob::class);
        $data['trip_options'] = $this->run(GetTripsPublishOptionsJob::class);
        $data['trip_availability'] = $this->run(GetDepartureAvailabilityJob::class);
        $data['note_keys'] = $this->run(GetTripNoteKeysJob::class);

        
        if($tripId = $request->trip)
        {

             if(!$data['trip'] = $this->run(new GetSingleTripJob($tripId)))
             {
                 throw new NotFoundHttpException();
             }
            //  print_r($data['trip']->gallery);exit;

        }
        return $this->run(new RespondWithViewJob('backend::trips.edit-add',$data));
    }
}
