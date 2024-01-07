<?php
namespace App\Services\Backend\Features\Trips;

use App\Domains\Activities\Jobs\StoreActivityJob;
use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Backend\Jobs\OrderItemsJob;
use App\Domains\Trips\Jobs\StoreTripJob;
use App\Services\Backend\Http\Requests\StoreActivityRequest;
use App\Services\Backend\Http\Requests\StoreTripRequest;
use Lucid\Units\Feature;

class StoreTripFeature extends Feature
{
    public function handle(StoreTripRequest $request)
    {

        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));

        $trip = $this->run(new StoreTripJob($request->except('_token')));
//        $this->run(new OrderItemsJob($trip,$trip->itinerary));
        $this->run(new SaveAttachmentJob($trip,$attachment));
        $this->run(new SaveCoverImageJob($trip,$cover_image));

        if($trip)
        {
            return redirect()->route('admin.trips.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}