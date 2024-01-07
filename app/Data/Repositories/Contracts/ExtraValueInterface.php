<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 9/19/18
 * Time: 3:13 PM
 */

namespace App\Data\Repositories\Contracts;


interface ExtraValueInterface
{

    public function getExtraKeysListByType($type);
}