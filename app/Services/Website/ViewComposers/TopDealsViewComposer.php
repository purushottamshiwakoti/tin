<?php


namespace App\Services\Website\ViewComposers;

use App\Domains\Trips\Jobs\GetOtherPackagesWithDealsJob;
use App\Domains\Trips\Jobs\GetTourPackagesWithDealsJob;
use App\Domains\Trips\Jobs\GetTrekkingPackagesWithDealsJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;
use Lucid\Foundation\JobDispatcherTrait;

class TopDealsViewComposer
{
    use DispatchesJobs,UnitDispatcher;
    public function compose(View $view)
    {
        $trekDeals = $this->run(new GetTrekkingPackagesWithDealsJob());
        $tourDeals = $this->run(new GetTourPackagesWithDealsJob());
        $otherDeals = $this->run(new GetOtherPackagesWithDealsJob());
        $view->with('trekDeals',$trekDeals);
        $view->with('tourDeals',$tourDeals);
        $view->with('otherDeals',$otherDeals);
//        $view->with('featuredTrips',$this->run(new GetScopedTripsJob(['Published','featured'])));
//        $view->with('allTrips',$this->run(new GetScopedTripsJob(['Published','Latest'])));
    }

}