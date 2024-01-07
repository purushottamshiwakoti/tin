<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 8/21/18
 * Time: 4:11 PM
 */

namespace App\Services\Website\ViewComposers;


use App\Domains\Trips\Jobs\GetScopedFixedDepartureJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;
use Lucid\Foundation\JobDispatcherTrait;

class DealsViewComposer
{

    use DispatchesJobs,UnitDispatcher;
    public function compose(View $view)
    {
        $view->with('hotDeals',$this->run(new GetScopedFixedDepartureJob(['published','active','lastminute'])));
    }
}