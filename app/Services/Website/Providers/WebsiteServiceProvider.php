<?php
namespace App\Services\Website\Providers;

use App\Data\Models\Enquiry;
use App\Data\Models\LandingInquiry;
use App\Data\Models\Subscriber;
use App\Data\Services\Payments\PaymentGateWayServiceProvider;
use App\Services\Website\Mail\CustomerEnquiryMail;
use App\Services\Website\Mail\EnquiryMail;
use App\Services\Website\Mail\LandingInquiryAdminMail;
use App\Services\Website\Mail\LandingInquiryMail;
use App\Services\Website\Mail\SubscribeMail;
use Illuminate\Support\Facades\Mail;
use View;
use Lang;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use App\Services\Website\Providers\RouteServiceProvider;
use Illuminate\Translation\TranslationServiceProvider;

class WebsiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap migrations and factories for:
     * - `php artisan migrate` command.
     * - factory() helper.
     *
     * Previous usage:
     * php artisan migrate --path=src/Services/Website/database/migrations
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

        Enquiry::created(function($enquiry){
            Mail::to(settings()->get('mail'))->send(new EnquiryMail($enquiry));

            
            Mail::to($enquiry->email)->send(new CustomerEnquiryMail($enquiry));
        });
        Subscriber::created(function($subscriber){
            
            Mail::to($subscriber->email)->send(new SubscribeMail($subscriber));
        });

        LandingInquiry::created(function($enquiry){
            Mail::to($enquiry->email)->send(new LandingInquiryMail($enquiry));
            Mail::to(settings()->get('mail'))->send(new LandingInquiryAdminMail($enquiry));
        });
    }
    

    /**
    * Register the Website service provider.
    *
    * @return void
    */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(ViewComposerServiceProvider::class);
        $this->app->register(PaymentGateWayServiceProvider::class);

        $this->registerResources();
    }

    /**
     * Register the Website service resource namespaces.
     *
     * @return void
     */
    protected function registerResources()
    {
        // Translation must be registered ahead of adding lang namespaces
        $this->app->register(TranslationServiceProvider::class);

        Lang::addNamespace('website', realpath(__DIR__.'/../resources/lang'));

        View::addNamespace('website', base_path('resources/views/vendor/website'));
        View::addNamespace('website', realpath(__DIR__.'/../resources/views'));
    }
}
