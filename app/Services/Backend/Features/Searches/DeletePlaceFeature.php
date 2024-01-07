<?php
namespace App\Services\Backend\Features\Searches;

use App\Domains\Search\Jobs\DeletePlaceJob;
use App\Domains\Search\Jobs\DeleteSearchJob;
use App\Domains\Testimonials\Jobs\DeleteTestimonialJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeletePlaceFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeletePlaceJob($request->search));
        return $result;
    }
}