<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/15/18
 * Time: 12:47 PM
 */

namespace App\Data\Services\Payments;

use App\Data\Models\Booking;

interface PaymentGatewayInterface
{

    public function initializePayment($payable,$transaction);


    public function getDetail($transaction);

}