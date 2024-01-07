<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/28/19
 * Time: 11:42 AM
 */

namespace App\Services\Website\Http\Controllers;


use App\Data\Services\Payments\PaymentService;
use App\Services\Website\Features\HandleCanceledPaymentFeature;
use App\Services\Website\Features\ShowSuccessPageFeature;
use App\Services\Website\Features\VerifyPaymentFeature;
use Illuminate\Http\Request;
use Lucid\Units\Controller;

class CheckoutController extends Controller
{

    protected $payment;
    public function __construct(PaymentService $payment)
    {
        $this->payment = $payment;
    }


    /**
     * @param Request $request
     * @param $gateway
     * @return mixed
     */
    public function verify(Request $request, $gateway)
    {
        return $this->serve(VerifyPaymentFeature::class);
    }

    /**
     * @param Request $request
     * @param $gateway
     * @return mixed
     */
    public function cancel(Request $request, $gateway)
    {
        return $this->serve(HandleCanceledPaymentFeature::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function success(Request $request)
    {
        return $this->serve(ShowSuccessPageFeature::class);
    }

}