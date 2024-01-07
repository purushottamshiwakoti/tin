<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/1/18
 * Time: 2:03 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Slider;
use App\Data\Repositories\Contracts\SliderInterface;
use App\Data\Repositories\Repository;

class SliderRepository extends Repository implements SliderInterface
{

    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }

}