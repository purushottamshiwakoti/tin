<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/24/18
 * Time: 12:26 PM
 */

namespace App\Services\Website\ViewComposers;

use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Domains\Trips\Jobs\GetDepartureArchivesJob;
use App\Domains\Trips\Jobs\GetScopedFixedDepartureJob;
use App\Domains\Trips\Jobs\GetPaginatedUpcomingFixedDepartureJob;

class UpcomingTripViewComposer
{

    use DispatchesJobs, UnitDispatcher;
    public function compose(View $view)
    {
      $view->with('departure_archives',makeDepartureArchives($this->run(new GetDepartureArchivesJob())));
      $view->with('hotDeals',$this->run(new GetPaginatedUpcomingFixedDepartureJob()));

	
    }

}