<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:59 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\TravelStyle;
use App\Data\Models\TripsTravelStylePivot;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use App\Data\Repositories\Contracts\TripsTravelStylePivotInterface;
use App\Data\Repositories\Repository;

class TripsTravelStylePivotRepository extends Repository implements TripsTravelStylePivotInterface
{

    public function __construct(TripsTravelStylePivot $model)
    {
        parent::__construct($model);
    }

 



}