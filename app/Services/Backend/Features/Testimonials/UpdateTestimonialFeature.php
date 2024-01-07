<?php
namespace App\Services\Backend\Features\Testimonials;

use App\Domains\Testimonials\Jobs\UpdateTestimonialJob;
use Lucid\Units\Feature;
use App\Domains\Attachments\Jobs\SaveAttachmentJob;
use App\Domains\Attachments\Jobs\SaveCoverImageJob;
use App\Domains\Attachments\Jobs\UploadMediaJob;
use Illuminate\Http\Request;

class UpdateTestimonialFeature extends Feature
{
    public function handle(Request $request)
    {

        $testimonialId = $request->testimonial;
      
        $attachment = $this->run(new UploadMediaJob($request->file('image')));
        $cover_image = $this->run(new UploadMediaJob($request->file('cover_image')));
       
        $testimonial = $this->run(new UpdateTestimonialJob($testimonialId,$request->except('_token')));
        $this->run(new SaveAttachmentJob($testimonial,$attachment));
        $this->run(new SaveCoverImageJob($testimonial,$cover_image));
      
        if(!$testimonial)
        {
            $result = ['message'=>'Something went wrong','alert-type'=>'error'];
            return redirect()->back()->with($result);
        }
        return redirect()->route('admin.testimonials.index');

    }
}
