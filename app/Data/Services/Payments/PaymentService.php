<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/14/18
 * Time: 12:04 PM
 */

namespace App\Data\Services\Payments;


use App\Data\Repositories\Contracts\TransactionInterface;

class PaymentService
{

    protected $gateway;
    protected $transaction;
    public function __construct(PaymentGatewayRegistry $gatewayRegistry,TransactionInterface $transaction)
    {
        $this->gateway = $gatewayRegistry;
        $this->transaction = $transaction;
    }

    public function makePayment($booking,$gateway)
    {
        return $this->gateway->get($gateway)->initializePayment($booking,$this->transaction);
    }

    public function saveCodTransaction($salesOrder)
    {
        return $this->transaction->fillAndSave([
            'sales_order_id'=>$salesOrder->id,
            'transaction_type'=>'credit',
            'status'=>'complete',
            'transaction_id' => $this->createNewToken()
        ]);

    }

    public function getDetail($transaction,$gateway,$payerId)
    {
//        $transaction = $this->transaction->getOneByCondition($gateway,$accessCode);
        return $this->gateway->get($gateway)->getDetail($transaction,$payerId);
    }

    public function getTransaction($gateway, $accessCode)
    {
        return $this->transaction->getOneTransactionByCond($gateway,$accessCode);
    }

    public function createNewToken()
    {
        return hash_hmac('sha256', \Illuminate\Support\Str::random(40),'lol');
    }

}