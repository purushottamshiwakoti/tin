<?php
namespace App\Services\Backend\Providers;

use View;
use Lang;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use App\Services\Backend\Providers\RouteServiceProvider;
use Illuminate\Translation\TranslationServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap migrations and factories for:
     * - `php artisan migrate` command.
     * - factory() helper.
     *
     * Previous usage:
     * php artisan migrate --path=src/Services/Backend/database/migrations
     * Now:
     * php artisan migrate
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom([
            realpath(__DIR__ . '/../database/migrations')
        ]);

        // $this->app->make(EloquentFactory::class)
        //     ->load(realpath(__DIR__ . '/../database/factories'));
    }

    /**
    * Register the Backend service provider.
    *
    * @return void
    */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->registerResources();
    }

    /**
     * Register the Backend service resource namespaces.
     *
     * @return void
     */
    protected function registerResources()
    {
        // Translation must be registered ahead of adding lang namespaces
        $this->app->register(TranslationServiceProvider::class);

        Lang::addNamespace('backend', realpath(__DIR__.'/../resources/lang'));

        View::addNamespace('backend', base_path('resources/views/vendor/backend'));
        View::addNamespace('backend', realpath(__DIR__.'/../resources/views'));
    }
}
