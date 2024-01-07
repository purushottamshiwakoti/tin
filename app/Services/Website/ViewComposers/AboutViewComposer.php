<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/24/18
 * Time: 12:26 PM
 */

namespace App\Services\Website\ViewComposers;

use App\Domains\Teams\Jobs\GetAllTeamJob;
use App\Domains\Trips\Jobs\GetDepartureArchivesJob;
use App\Domains\Trips\Jobs\GetScopedFixedDepartureJob;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;

class AboutViewComposer
{

    use DispatchesJobs, UnitDispatcher;
    public function compose(View $view)
    {
      $view->with('teams',$this->run(new GetAllTeamJob(['published'])));

	
    }

}