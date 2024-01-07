<?php
namespace App\Services\Backend\Features\Activities;

use App\Domains\Activities\Jobs\UpdateActivityJob;
use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Services\Backend\Http\Requests\StoreActivityRequest;
use Lucid\Units\Feature;

class UpdateActivityFeature extends Feature
{
    public function handle(StoreActivityRequest $request)
    {

        $activityId = $request->activity;
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));

        $activity = $this->run(new UpdateActivityJob($activityId,$request->except('_token')));
        $this->run(new SaveAttachmentJob($activity,$attachment));
        $this->run(new SaveCoverImageJob($activity,$cover_image));
        if(!$activity)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.activities.index');

    }
}
