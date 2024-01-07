<?php
namespace App\Services\Backend\Features\Trips;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\SaveMultipleImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Backend\Jobs\OrderItemsJob;
use App\Domains\TravelStyles\Jobs\SaveTripsTravelStylePivotJob;
use App\Domains\Trips\Jobs\UpdateTripJob;
use App\Services\Backend\Http\Requests\StoreTripRequest;
use Lucid\Units\Feature;

class UpdateTripFeature extends Feature
{
    public function handle(StoreTripRequest $request)
    {
// dd($request->all());
        $tripId = $request->trip;
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $trip = $this->run(new UpdateTripJob($tripId,$request->except('_token')));
        if ($request->hasFile('gallery')) {

        foreach($request->file('gallery') as $file){
            // print_r($file);exit;
            $gallery = $this->run(new UploadMediaJob($file));
            // print_r($gallery);exit;
            $this->run(new SaveMultipleImageJob($trip,$gallery,'gallery'));
        }
    }
        // print_r($request->all());exit;
        
//        $this->run(new OrderItemsJob($trip,$trip->itinerary));
        $this->run(new SaveAttachmentJob($trip,$attachment));
        $this->run(new SaveCoverImageJob($trip,$cover_image));
        if(!$trip)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.trips.index');

    }
}