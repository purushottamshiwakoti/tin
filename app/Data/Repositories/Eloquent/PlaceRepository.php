<?php


namespace App\Data\Repositories\Eloquent;

use App\Data\Models\Place;
use App\Data\Repositories\Contracts\PlaceInterface;
use App\Data\Repositories\Repository;

class PlaceRepository extends Repository implements PlaceInterface
{

    public function __construct(Place $model)
    {
        parent::__construct($model);
    }

    public function getBySlug($slug)
    {
        return $this->findBy('slug',$slug);
    } 

    public function getFlightPlaces()
    {
       
        return $this->model->where(['publish_types'=>'flights','status'=>'1'])->get();
    }
    public function getHotelPlaces()
    {
        return $this->model->where(['publish_types'=>'hotels','status'=>'1'])->get();
    }
    // public function getCar()
    // {
    //     return $this->where('publish_types','car')->get();
    // }

  



}