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
use App\Domains\TravelStyles\Jobs\GetAllTravelStyleJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;

class FilterViewComposer
{

    use DispatchesJobs, UnitDispatcher;
    public function compose(View $view)
    {

 
        $view->with('destination',$this->run(new GetAllDestinationsJob(['published'])));
        $view->with('activities',$this->run(new GetScopedActivitiesJob(['published'])));
        $view->with('style',$this->run(new GetAllTravelStyleJob(['published'])));
   
    }

}