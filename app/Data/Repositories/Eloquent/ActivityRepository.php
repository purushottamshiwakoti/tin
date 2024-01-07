<?php

/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:59 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Activity;
use App\Data\Repositories\Contracts\ActivityInterface;
use App\Data\Repositories\Repository;

class ActivityRepository extends Repository implements ActivityInterface
{

    public function __construct(Activity $model)
    {
        parent::__construct($model);
    }

    public function findBySlug($slug)
    {
        return $this->findBy('slug',$slug);
    }

    public function getAllActivity()
    {
        return $this->model->where('publish', 1)->get();
    }

    public function getActivitiesByDestination($destinationslug)
    {
        return $this->model->whereHas('trips.destination',  function ($q)  use ($destinationslug) {
            $q->where('slug', '=', $destinationslug);
        })->get();
    }

    public function getNepalActivities($destinationslug='nepal')
    {
        return $this->model->whereHas('trips.destination',  function ($q)  use ($destinationslug) {
            $q->where('slug', '=', $destinationslug);
        })->limit(4);
    }

}