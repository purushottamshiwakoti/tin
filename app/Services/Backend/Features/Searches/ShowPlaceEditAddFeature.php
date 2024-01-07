<?php
namespace App\Services\Backend\Features\Searches;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Pages\Jobs\GetSinglePageJob;
use App\Domains\Search\Jobs\GetPlacePublishOptionsJob;
use App\Domains\Search\Jobs\GetSearchPublishOptionsJob;
use App\Domains\Search\Jobs\GetSinglePlaceJob;
use App\Domains\Search\Jobs\GetSingleSearchJob;
use Http\Discovery\Exception\NotFoundException;

class ShowPlaceEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['search'] = null;
        $data['type_options'] = $this->run(GetPlacePublishOptionsJob::class);

        if($searchId = $request->search)
        {
             if(!$data['search'] = $this->run(new GetSinglePlaceJob($searchId)))
             {
                 throw new NotFoundException();
             }
        }


        return $this->run(new RespondWithViewJob('backend::searches.edit-add',$data));


    }
}