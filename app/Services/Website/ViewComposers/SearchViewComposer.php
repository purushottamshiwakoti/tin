<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/20/18
 * Time: 3:40 PM
 */

namespace App\Services\Website\ViewComposers;


use App\Domains\Activities\Jobs\GetAllActivitiesJob;
use App\Domains\Regions\Jobs\GetAllRegionsJob;
use App\Domains\Trips\Jobs\SearchTripsJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;
use Lucid\Foundation\JobDispatcherTrait;

class SearchViewComposer
{

    use UnitDispatcher,DispatchesJobs;

    public function compose(View $view)
    {
        $request = new Request();
//        $trips = $this->run(new SearchTripsJob(['title','caption','meta_title'],$request->get('q')));
        $view->with('activities',$this->run(new GetAllActivitiesJob()));
        $view->with('regions',$this->run(new GetAllRegionsJob()));
//        $view->with('trips',$trips);
    }

}