<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 3/28/19
 * Time: 11:54 AM
 */

namespace App\Data\Services\Payments;


interface PayableInterface
{

    public function getTotalPrice();

    public function getPrimaryKey();

    public function getMorphKey();

    public function transaction();
}