<?php
namespace App\Services\Backend\Features\TravelStyle;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Destinations\Jobs\UpdateDestinationJob;
use App\Domains\TravelStyles\Jobs\UpdateTravelStyleJob;
use App\Services\Destinations\Http\Requests\StoreDestinationRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateTravelStyleFeature extends Feature
{
    public function handle(Request $request)
    {

        $travelstyleId = $request->travelstyle;
      

        $travelstyle = $this->run(new UpdateTravelStyleJob($travelstyleId,$request->except('_token')));

      
        if(!$travelstyle)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.travelstyles.index');

    }
}
