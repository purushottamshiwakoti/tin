<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 8/21/18
 * Time: 1:44 PM
 */

namespace App\Data\Repositories\Eloquent;

use App\Data\Models\CarHires;
use App\Data\Repositories\Contracts\CarInterface;
use App\Data\Repositories\Repository;

class CarRepository extends Repository implements CarInterface
{

    public function __construct(CarHires $model)
    {
        parent::__construct($model);
    }
}