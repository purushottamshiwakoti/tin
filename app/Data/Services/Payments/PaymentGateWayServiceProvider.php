<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/15/18
 * Time: 1:08 PM
 */

namespace App\Data\Services\Payments;


use App\Data\Services\Payments\Gateways\PaypalExpress;
use App\Data\Services\Payments\Gateways\PaypalPayment;
use Illuminate\Support\ServiceProvider;

class PaymentGateWayServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(PaymentGatewayRegistry::class);
    }

    public function boot()
    {
        $this->app->make(PaymentGatewayRegistry::class)
            ->register('paypal', new PaypalPayment())->register('paypal-express', new PaypalExpress());
    }

}