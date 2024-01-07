<?php
namespace App\Services\Backend\Features\Testimonials;

use App\Domains\Backend\Jobs\MakeDatatableSearchFieldsJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Teams\Jobs\DatatablePaginateTeamJob;
use App\Domains\Testimonials\Jobs\DatatablePaginateTestimonialJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ListTestimonialFeature extends Feature
{
    public function handle(Request $request)
    {
        $searchData = $this->run(new MakeDatatableSearchFieldsJob($request->all()));
        $data = $this->run(new DatatablePaginateTestimonialJob($searchData,$request->get('length')));

        return $this->run(new RespondWithJsonJob($data));

    }
}
