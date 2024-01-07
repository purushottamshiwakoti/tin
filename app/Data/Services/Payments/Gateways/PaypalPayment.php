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

class PaypalPayment implements PaymentGatewayInterface
{

    protected $gateway;
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->initialize(array(
        'clientId' => config('omnipay.paypal.api_key'),
        'secret'   => config('omnipay.paypal.secret_key'),
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
        $data = $response->getData();
        $token = '';
        foreach ($data['links'] as $link)
        {
            if($link['rel']=='approval_url'){
                $token = explode('&token=',$link['href'])[1];
                break;
            }
        }

        if(isset($data['id']))
        {
            $transaction->fillAndSave(['status'=>'requested','payable_type'=>$booking->getMorphKey(),'payable_id'=>$booking->getPrimaryKey(),'gateway'=>'paypal','transaction_id'=>$data['id']]);
            return ['message'=>'success','id'=>$token];
        }
        return ['message'=>'error'];

        if ($response->isRedirect()) {
            // redirect to offsite payment gateway
            $response->redirect();
        } elseif ($response->isSuccessful()) {
            // payment was successful: update database
            print_r($response);
        } else {
            // payment failed: display message to customer
            throw new \Exception($response->getMessage());
        }
    }

    public function getDetail($transaction,$payerId = null)
    {
        $response = $this->gateway->completePurchase(['transactionReference'=>$transaction->transaction_id,'payerId'=>$payerId])->send();
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