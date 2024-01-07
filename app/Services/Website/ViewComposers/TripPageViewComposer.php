<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 8/27/18
 * Time: 2:22 PM
 */

namespace App\Services\Website\ViewComposers;

use App\Domains\Destinations\Jobs\GetAllDestinationsJob;
use App\Domains\Testimonials\Jobs\GetAllTestimonialJob;
use App\Domains\Trips\Jobs\GetAllPaginateTripJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;

class TripPageViewComposer
{

    use UnitDispatcher,DispatchesJobs;

    public function compose(View $view)
    {
        $view->with('trips',$this->run(new GetAllPaginateTripJob()));
        $view->with('testimonial',$this->run(new GetAllTestimonialJob(['published'])));

    }
}