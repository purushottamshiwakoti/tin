<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/28/19
 * Time: 11:28 AM
 */

return [
    'paypal'=>[
        'api_key'=>env('PAYPAL_API_KEY'),
        'secret_key'=>env('PAYPAL_SECRET_KEY'),
        'redirect_url'=>env('APP_URL').'/checkout/verify/paypal',
        'cancel_url'=>env('APP_URL').'/checkout/verify/paypal',
    ],


    'paypal_express'=>[
        'username'=>env('PAYPAL_EXPRESS_USER'),
        'password'=>env('PAYPAL_EXPRESS_PASSWORD'),
        'signature'=>env('PAYPAL_EXPRESS_SIGNATURE'),
        'testMode'=>env('SANDBOX')
    ],
];