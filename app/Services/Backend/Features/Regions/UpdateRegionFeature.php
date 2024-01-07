<?php
namespace App\Services\Backend\Features\Regions;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Regions\Jobs\UpdateRegionJob;
use App\Services\Backend\Http\Requests\StoreRegionRequest;
use Lucid\Units\Feature;

class UpdateRegionFeature extends Feature
{
    public function handle(StoreRegionRequest $request)
    {

        $regionId = $request->region;
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));

        $region = $this->run(new UpdateRegionJob($regionId,$request->except('_token')));
        $this->run(new SaveAttachmentJob($region,$attachment));
        $this->run(new SaveCoverImageJob($region,$cover_image));
        if(!$region)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.regions.index');

    }
}
