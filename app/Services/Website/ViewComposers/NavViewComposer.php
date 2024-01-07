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
use App\Domains\Destinations\Jobs\GetAllPublishedDestinationsJob;
use App\Domains\Lastminutedeal\Jobs\GetHotDealsJob;
use App\Domains\Offers\Jobs\GetOfferByScopeJob;
use App\Domains\Trips\Jobs\GetOtherPackagesWithDealsJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use App\Domains\Trips\Jobs\GetTourPackagesWithDealsJob;
use App\Domains\Trips\Jobs\GetTrekkingPackagesWithDealsJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;

class NavViewComposer
{

    use DispatchesJobs, UnitDispatcher;
    public function compose(View $view)
    {
        $view->with('topCountries',$this->run(new GetAllPublishedDestinationsJob));
        $view->with('activities',$this->run(new GetScopedActivitiesJob(['Published'])));
        $view->with('menuFeatured',$this->run(new GetScopedTripsJob(['published','MenuFeatured'])));


    }

}