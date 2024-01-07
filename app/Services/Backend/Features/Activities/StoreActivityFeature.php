<?php
namespace App\Services\Backend\Features\Activities;

use App\Domains\Activities\Jobs\StoreActivityJob;
use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Services\Backend\Http\Requests\StoreActivityRequest;
use Lucid\Units\Feature;

class StoreActivityFeature extends Feature
{
    public function handle(StoreActivityRequest $request)
    {

        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $activity = $this->run(new StoreActivityJob($request->all()));
        $this->run(new SaveAttachmentJob($activity,$attachment));
        $this->run(new SaveCoverImageJob($activity,$cover_image));
        if($activity)
        {
            return redirect()->route('admin.activities.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
