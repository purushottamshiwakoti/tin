<?php

namespace App\Providers;

use App\Data\Models\Activity;
use App\Data\Models\Booking;
use App\Data\Models\FixedDeparture;
use App\Data\Models\Page;
use App\Data\Models\Post;
use App\Data\Models\Region;
use App\Data\Models\Setting;
use App\Data\Models\Trip;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Relation::morphMap([
            'activity'=>Activity::class,
            'region'=>Region::class,
            'page'=>Page::class,
            'setting'=>Setting::class,
            'trip'=>Trip::class,
            'post'=>Post::class,
            'booking'=>Booking::class,
            'departure'=>FixedDeparture::class
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        Paginator::useBootstrap();

    }
}
