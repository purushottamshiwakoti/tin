<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/28/19
 * Time: 11:24 AM
 */

namespace App\Data\Services\Payments\Gateways;


use App\Data\Models\Booking;
use App\Data\Services\Payments\PayableInterface;
use App\Data\Services\Payments\PaymentGatewayInterface;
use Omnipay\Omnipay;
use Omnipay\PayPal\RestGateway;

class PaypalExpress implements PaymentGatewayInterface
{

    protected $gateway;
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Express');
        $this->gateway->initialize(array(
            'username' => config('omnipay.paypal_express.username'),
            'password' => config('omnipay.paypal_express.password'),
            'signature'   => config('omnipay.paypal_express.signature'),
            'testMode' => config('omnipay.paypal_express.testMode'), // Or false when you are ready for live transactions
    ));
    }

    public function initializePayment($booking, $transaction)
    {
        $total_price = $booking->getTotalPrice();
        $order =[
            'amount' => $total_price,
            'currency' => 'AUD',
            'returnUrl'=>config('omnipay.paypal.redirect_url'),
            'cancelUrl'=>config('omnipay.paypal.cancel_url'),
        ];
        $response = $this->gateway->purchase($order)->send();
//        print_r($response);exit;
        $data = $response->getData();

        $rs = $this->gateway->capture(['transactionReference'=>$data['TOKEN'],'amount'=>$total_price])->send();
        print_r($rs->getData());exit;
//        return $data;

        if(isset($data['TOKEN']))
        {
//            $transaction->fillAndSave(['status'=>'requested','payable_type'=>$booking->getMorphKey(),'payable_id'=>$booking->getPrimaryKey(),'gateway'=>'paypal','transaction_id'=>$data['id']]);
            $response = $this->gateway->fetchCheckout(['token'=>$data['TOKEN']])->send();
            $result= $response->getData();
            print_r($result);exit;
        }

        return false;

        return $data;
    }

    public function getDetail($transaction,$payerId = null)
    {
        $response = $this->gateway->fetchCheckout(['transactionReference'=>$transaction->transaction_id,'payerId'=>$payerId])->send();
        if(!$data = $response->getData())
        {
            return false;
        }

        if($transaction->status!='requested'){
            return false;
        }
        $result = false;
        if($response->isSuccessful())
        {
            $updArr = ['status'=>'complete','payer_id'=>$payerId];
            $result = true;

        }else{
            $updArr = ['status'=>'declined','payer_id'=>$payerId];
        }
        $transaction->update($updArr);
        return $result;

    }
}