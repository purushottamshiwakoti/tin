<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 9/21/18
 * Time: 4:33 PM
 */

namespace App\Data\Repositories\Contracts;


interface LastMinuteDealInterface
{

    public function getHotDealsByTripableType($type);
}