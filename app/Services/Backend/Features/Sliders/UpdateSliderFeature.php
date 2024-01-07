<?php
namespace App\Services\Backend\Features\Sliders;

use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Sliders\Jobs\UpdateSliderJob;

use App\Services\Backend\Http\Requests\StoreSliderRequest;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class UpdateSliderFeature extends Feature
{
    public function handle(StoreSliderRequest $request)
    {

        $sliderId = $request->slider;
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $slider = $this->run(new UpdateSliderJob($sliderId,$request->except('_token')));
        $this->run(new SaveAttachmentJob($slider,$attachment));
        if(!$slider)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.sliders.index');

    }
}
