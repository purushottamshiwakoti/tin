<?php
namespace App\Services\Backend\Features\Activities;

use App\Domains\Activities\Jobs\GetActivityPublishOptionsJob;
use App\Domains\Activities\Jobs\GetSingleActivityJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowActivityEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['activity'] = null;
        $data['activity_options'] = $this->run(GetActivityPublishOptionsJob::class);
        if($destinationId = $request->activity)
        {
             if(!$data['activity'] = $this->run(new GetSingleActivityJob($destinationId)))
             {
                 throw new NotFoundHttpException();
             }
        }


        return $this->run(new RespondWithViewJob('backend::activities.edit-add',$data));

    }
}
