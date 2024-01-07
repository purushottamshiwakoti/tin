<?php
namespace App\Services\Backend\Features\Testimonials;

use App\Domains\Testimonials\Jobs\DeleteTestimonialJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeleteTestimonialFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeleteTestimonialJob($request->testimonial));
        return $result;
    }
}
