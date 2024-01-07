<?php


namespace App\Data\Repositories\Eloquent;

use App\Data\Models\Teams;
use App\Data\Models\TravelStyle;
use App\Data\Repositories\Contracts\TeamInterface;
use App\Data\Repositories\Contracts\TravelStyleInterface;
use App\Data\Repositories\Repository;

class TeamRepository extends Repository implements TeamInterface
{

    public function __construct(Teams $model)
    {
        parent::__construct($model);
    }

    public function getBySlug($slug)
    {
        return $this->findBy('slug',$slug);
    }



}