<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 8/27/18
 * Time: 2:22 PM
 */

namespace App\Services\Website\ViewComposers;

use App\Domains\Destinations\Jobs\GetAllDestinationsJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;

class CountryPageViewComposer
{

    use UnitDispatcher,DispatchesJobs;

    public function compose(View $view)
    {
        $view->with('countries',$this->run(new GetAllDestinationsJob(['published'])));
    }
}