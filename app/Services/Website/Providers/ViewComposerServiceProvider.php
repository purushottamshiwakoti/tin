<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/21/18
 * Time: 9:58 PM
 */

namespace App\Services\Website\Providers;

use App\Services\Website\ViewComposers\AboutViewComposer;
use App\Services\Website\ViewComposers\ActivitiesPageViewComposer;
use App\Services\Website\ViewComposers\ActivityViewComposer;
use App\Services\Website\ViewComposers\AdminViewComposer;
use App\Services\Website\ViewComposers\BlogSidebarViewComposer;
use App\Services\Website\ViewComposers\CountryPageViewComposer;
use App\Services\Website\ViewComposers\DealsViewComposer;
use App\Services\Website\ViewComposers\FaqPageViewComposer;
use App\Services\Website\ViewComposers\FilterViewComposer;
use App\Services\Website\ViewComposers\NavViewComposer;
use App\Services\Website\ViewComposers\SearchViewComposer;
use App\Services\Website\ViewComposers\TopDealsViewComposer;
use App\Services\Website\ViewComposers\TravelStylePageViewComposer;
use App\Services\Website\ViewComposers\TripPageViewComposer;
use App\Services\Website\ViewComposers\UpcomingTripViewComposer;
use App\Services\Website\ViewComposers\UserDashboardViewComposer;
use App\Services\Website\ViewComposers\WebsiteViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer('website::pages.search',SearchViewComposer::class);
        View::composer('website::pages.activity',ActivityViewComposer::class);
        // View::composer('website::blog.partials.right-sidebar',BlogSidebarViewComposer::class);
        View::composer('website::blog.detail',BlogSidebarViewComposer::class);
        View::composer('website::pages.blog',BlogSidebarViewComposer::class);
        View::composer('website::pages.last-minute-deals',DealsViewComposer::class);
        View::composer('website::blog.partials.right-sidebar',DealsViewComposer::class);
        View::composer('website::partials.filters',FilterViewComposer::class);
        View::composer('website::pages.faq',FaqPageViewComposer::class);
        View::composer('website::pages.countries',CountryPageViewComposer::class);
        View::composer('website::pages.activities',ActivitiesPageViewComposer::class);
        View::composer('website::pages.trips',TripPageViewComposer::class);
        View::composer('website::pages.trip',TripPageViewComposer::class);
        View::composer('backend::layouts.master',AdminViewComposer::class);
        View::composer('website::layouts.master',WebsiteViewComposer::class);
        View::composer('website::layouts.nav',NavViewComposer::class);
        // View::composer('website::menu.nav',TopDealsViewComposer::class);
        View::composer('website::menu.nav',NavViewComposer::class);
        View::composer('website::user.dashboard-wishlist',UserDashboardViewComposer::class);
        View::composer('website::pages.travel-style',TravelStylePageViewComposer::class);
        View::composer('website::pages.trip-planner',TravelStylePageViewComposer::class);
        View::composer('website::pages.tailor-made',TravelStylePageViewComposer::class);
        View::composer('website::pages.upcoming-trip',UpcomingTripViewComposer::class);
        View::composer('website::pages.about',AboutViewComposer::class);
    }
}