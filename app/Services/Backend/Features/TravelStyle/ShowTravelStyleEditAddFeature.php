<?php
namespace App\Services\Backend\Features\TravelStyle;

use App\Domains\TravelStyles\Jobs\GetSingleTravelStyleJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Http\Discovery\Exception\NotFoundException;

class ShowTravelStyleEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['travelstyle'] = null;
        if($travelstyleId = $request->travelstyle)
        {
             if(!$data['travelstyle'] = $this->run(new GetSingleTravelStyleJob($travelstyleId)))
             {
                 throw new NotFoundException();
             }
        }


        return $this->run(new RespondWithViewJob('backend::travelstyles.edit-add',$data));


    }
}
