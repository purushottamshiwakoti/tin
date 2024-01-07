<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/29/18
 * Time: 1:13 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Itinerary;
use App\Data\Repositories\Contracts\ItineraryInterface;
use App\Data\Repositories\Repository;

class ItineraryRepository extends Repository implements ItineraryInterface
{

    public function __construct(Itinerary $model)
    {
        parent::__construct($model);
    }

}