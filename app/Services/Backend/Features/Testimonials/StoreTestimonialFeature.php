<?php
namespace App\Services\Backend\Features\Testimonials;
use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use App\Domains\Teams\Jobs\StoreTeamJob;
use App\Domains\Testimonials\Jobs\StoreTestimonialJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreTestimonialFeature extends Feature
{
    public function handle(Request $request)
    {

        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
        $testimonial = $this->run(new StoreTestimonialJob($request->all()));
        $this->run(new SaveAttachmentJob($testimonial,$attachment));
        $this->run(new SaveCoverImageJob($testimonial,$cover_image));
        if($testimonial)
        {
            return redirect()->route('admin.testimonials.index');
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);

    }
}
