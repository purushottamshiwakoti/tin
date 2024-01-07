<?php
namespace App\Services\Backend\Features\Testimonials;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Teams\Jobs\GetSingleTeamJob;
use App\Domains\Testimonials\Jobs\GetSingleTestimonialJob;
use Http\Discovery\Exception\NotFoundException;

class ShowTestimonialEditAddFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = [];
        $data['testimonial'] = null;
        if($testimonialId = $request->testimonial)
        {
             if(!$data['testimonial'] = $this->run(new GetSingleTestimonialJob($testimonialId)))
             {
                 throw new NotFoundException();
             }
        }


        return $this->run(new RespondWithViewJob('backend::testimonials.edit-add',$data));


    }
}
