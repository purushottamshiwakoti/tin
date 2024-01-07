<?php
namespace App\Services\Website\Features;

use App\Data\Models\Review;
use App\Data\Models\Trip;
use App\Domains\FixedDepartures\Jobs\GetAvailableMonthsJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Metas\Jobs\MakeMetasJob;
use App\Domains\Testimonials\Jobs\GetAllTestimonialJob;
use App\Domains\Trips\Jobs\GetOtherPackagesJob;
use App\Domains\Trips\Jobs\GetSingleTripBySlugJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowTripDetailPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['trip'] = $this->run(new GetSingleTripBySlugJob($request->trip));
        $data['averageRating'] = $data['trip']->getAverageRatingAttribute('dummy');
        $data['metas'] = $this->run(new MakeMetasJob($data['trip']));
        $data['available_months'] = $this->run(new GetAvailableMonthsJob($data['trip']));
        $data['testimonial'] = $this->run(new GetAllTestimonialJob(['published']));

        $data['other_trip'] = $this->run(new GetOtherPackagesJob($data['trip']));
        return $this->run(new RespondWithViewJob('website::trips.trip',$data));
    }
}
