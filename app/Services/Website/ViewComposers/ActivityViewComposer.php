<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/24/18
 * Time: 12:26 PM
 */

namespace App\Services\Website\ViewComposers;

use App\Domains\Activities\Jobs\GetScopedActivitiesJob;
use App\Domains\Destinations\Jobs\GetAllDestinationsJob;
use App\Domains\Offers\Jobs\GetOfferByScopeJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;

class ActivityViewComposer
{

    use DispatchesJobs, UnitDispatcher;
    public function compose(View $view)
    {

        $view->with('allTrips',$this->run(new GetScopedTripsJob(['Published','Latest'])));
        

    }

}