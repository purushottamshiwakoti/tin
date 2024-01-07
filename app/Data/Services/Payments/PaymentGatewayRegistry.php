<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/15/18
 * Time: 1:05 PM
 */

namespace App\Data\Services\Payments;

class PaymentGatewayRegistry
{
    protected $gateways = [];

    public function register($name,PaymentGatewayInterface $instance)
    {
        $this->gateways[$name] = $instance;
        return $this;
    }

    public function get($name)
    {

        if(in_array($name,array_keys($this->gateways)))
        {
            return $this->gateways[$name];
        }else{
            throw new \Exception("Invalid gateway");
        }
    }

}