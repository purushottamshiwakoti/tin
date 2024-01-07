<?php
namespace App\Services\Backend\Features\Pages;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Pages\Jobs\StorePageJob;
use App\Services\Backend\Http\Requests\StorePageRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StorePagesFeature extends Feature
{
    public function handle(StorePageRequest $request)
    {
        $attachment = $this->run(new UploadMediaJob($request->file('image')));

        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $page = $this->run(new StorePageJob($request->all()));

        $this->run(new SaveAttachmentJob($page,$attachment));
        $this->run(new SaveCoverImageJob($page,$cover_image));
        if($page)
        {
            $result = ['message'=>'Successful','alert-type'=>'success'];
            return redirect()->back()->with($result);
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->withInput()->with($result);

    }
}
