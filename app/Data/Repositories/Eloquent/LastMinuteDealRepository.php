<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 9/21/18
 * Time: 4:33 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\LastMinuteDeal;
use App\Data\Repositories\Contracts\LastMinuteDealInterface;
use App\Data\Repositories\Repository;

class LastMinuteDealRepository extends Repository implements LastMinuteDealInterface
{

    public function __construct(LastMinuteDeal $model)
    {
        parent::__construct($model);
    }

    public function getHotDealsByTripableType($type)
    {
        return $this->model->where('is_menu_featured',1)->whereHas('departure.trip',function ($q) use($type){
            return $q->where('tripable_type',$type)->groupBy('id');
        })->get();
    }

}