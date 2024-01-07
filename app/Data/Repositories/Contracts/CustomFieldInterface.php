<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 8/27/18
 * Time: 1:07 PM
 */

namespace App\Data\Repositories\Contracts;


interface CustomFieldInterface
{

    public function findOneByExtra($value);
}