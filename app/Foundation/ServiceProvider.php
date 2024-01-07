<?php
namespace App\Foundation;

use App\Domains\Settings\SettingServiceProvider;
use App\Services\Api\Providers\ApiServiceProvider;
use App\Services\Backend\Providers\BackendServiceProvider;
use App\Services\Backend\Providers\RepositoryServiceProvider;
use App\Services\Blog\Providers\BlogServiceProvider;
use App\Services\Offers\Providers\OffersServiceProvider;
use App\Services\Ratings\Providers\RatingsServiceProvider;
use App\Services\Website\Providers\WebsiteServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        // Register the service providers of your Services here.
        // $this->app->register('full namespace here')
        $this->app->register(SettingServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(BackendServiceProvider::class);
        $this->app->register(WebsiteServiceProvider::class);
        $this->app->register(ApiServiceProvider::class);
        $this->app->register(RatingsServiceProvider::class);
        $this->app->register(OffersServiceProvider::class);
        $this->app->register(BlogServiceProvider::class);
        $this->app->register(DataExportServiceProvider::class);
    }
}
