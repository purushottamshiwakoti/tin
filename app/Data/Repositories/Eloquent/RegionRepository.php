<?php

namespace App\Data\Repositories\Eloquent;




use App\Data\Models\Region;
use App\Data\Repositories\Contracts\RegionInterface;
use App\Data\Repositories\Repository;

class RegionRepository extends Repository implements RegionInterface
{

    public function __construct(Region $model)
    {
        parent::__construct($model);
    }
    public function getAllRegion()
    {
        return $this->model->where('publish', 1)->get();
    }
}
