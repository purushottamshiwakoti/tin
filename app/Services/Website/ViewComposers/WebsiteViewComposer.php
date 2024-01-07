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
use App\Domains\Lastminutedeal\Jobs\GetHotDealsJob;
use App\Domains\Offers\Jobs\GetOfferByScopeJob;
use App\Domains\Trips\Jobs\GetOtherPackagesWithDealsJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use App\Domains\Trips\Jobs\GetTourPackagesWithDealsJob;
use App\Domains\Trips\Jobs\GetTrekkingPackagesWithDealsJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;

class WebsiteViewComposer
{

    use DispatchesJobs, UnitDispatcher;
    public function compose(View $view)
    {
//        $trekDeals = $this->run(new GetTrekkingPackagesWithDealsJob());
//        $tourDeals = $this->run(new GetTourPackagesWithDealsJob());
//        $otherDeals = $this->run(new GetOtherPackagesWithDealsJob());
//        $view->with('trekDeals',$trekDeals);
//        $view->with('tourDeals',$tourDeals);
//        $view->with('otherDeals',$otherDeals);
        $view->with('featuredTrips',$this->run(new GetScopedTripsJob(['Published','featured'])));
        $view->with('allTrips',$this->run(new GetScopedTripsJob(['Published','Latest'])));
        $view->with('topCountries',$this->run(new GetAllDestinationsJob(['Published'])));

        $data['activities'] = $this->run(new GetScopedActivitiesJob(['published']));

        $offers = $this->run(new GetOfferByScopeJob(['active']));
        $view->with('offers',$offers);
    }

}