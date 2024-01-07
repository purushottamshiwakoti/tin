<?php
namespace App\Services\Backend\Features\Regions;

use App\Domains\Activities\Jobs\StoreActivityJob;
use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Regions\Jobs\StoreRegionJob;
use App\Services\Backend\Http\Requests\StoreActivityRequest;
use App\Services\Backend\Http\Requests\StoreRegionRequest;
use Lucid\Units\Feature;

class StoreRegionFeature extends Feature
{
    public function handle(StoreRegionRequest $request)
    {
        // dd($request->all());

        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $region = $this->run(new StoreRegionJob($request->all()));
        $this->run(new SaveAttachmentJob($region,$attachment));
        $this->run(new SaveCoverImageJob($region,$cover_image));
        if($region)
        {
            return redirect()->route('admin.regions.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
