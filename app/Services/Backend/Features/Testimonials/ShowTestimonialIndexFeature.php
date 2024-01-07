<?php
namespace App\Services\Backend\Features\Testimonials;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowTestimonialIndexFeature extends Feature
{
    public function handle(Request $request)
    {
      
        return $this->run(new RespondWithViewJob('backend::testimonials.index'));
    }
}
