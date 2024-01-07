<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 10/8/18
 * Time: 4:15 PM
 */

namespace App\Services\Website\ViewComposers;


use App\Domains\Activities\Jobs\GetPublishedActivitiesJob;
use App\Domains\Destinations\Jobs\GetAllDestinationsJob;
use App\Domains\FaqCategories\Jobs\GetFaqCategoryByPageJob;
use App\Domains\Pages\Jobs\GetSinglePageBySlugJob;
use App\Domains\Regions\Jobs\GetAllRegionsJob;
use App\Domains\Trips\Jobs\GetScopedTripsJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\View\View;
use Lucid\Bus\UnitDispatcher;
use Lucid\Foundation\JobDispatcherTrait;

class TravelStylePageViewComposer
{
    use DispatchesJobs,UnitDispatcher;
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $page_slug = request()->slug;
        $page = $this->run(new GetSinglePageBySlugJob($page_slug));
        $faqCategory = $this->run(new GetFaqCategoryByPageJob($page->id));
        $destinations = $this->run(new GetAllDestinationsJob(['published', 'Latest']));
        $view->with('destinations',$destinations);

        if($faqCategory)
        {
            $faqs = $faqCategory->faqs;
        }else{
            $faqs = [];
        }

        $view->with('faqs',$faqs);
        
        $activities = $this->run(new GetPublishedActivitiesJob());
        $view->with('activity_lists',$activities);
        
        $regions = $this->run(new GetAllRegionsJob());
        $view->with('regions',$regions);
        
        $trips = $this->run(new GetScopedTripsJob(['Published']));
        $view->with('trips',$trips);
    }
}