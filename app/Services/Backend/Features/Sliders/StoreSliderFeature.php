<?php
namespace App\Services\Backend\Features\Sliders;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Sliders\Jobs\StoreSliderJob;
use App\Services\Backend\Http\Requests\StoreSliderRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreSliderFeature extends Feature
{
    public function handle(StoreSliderRequest $request)
    {

        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $slider = $this->run(new StoreSliderJob($request->all()));
        $this->run(new SaveAttachmentJob($slider,$attachment));
        if($slider)
        {
            return redirect()->route('admin.sliders.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
