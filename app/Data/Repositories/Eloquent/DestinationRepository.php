<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:59 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Destination;
use App\Data\Repositories\Contracts\DestinationInterface;
use App\Data\Repositories\Repository;

class DestinationRepository extends Repository implements DestinationInterface
{

    public function __construct(Destination $model)
    {
        parent::__construct($model);
    }

    public function getAllPublishedDestination()
    {
        return $this->model->where('publish',1)->with('trips','faqs','destinationTrip','regions','activities')->get();
    }
    public function getBySlug($slug)
    {
        return $this->findBy('slug',$slug);
    }

    public function paginateNew($page=10)
    {
        return $this->model->where('publish',1)->paginate($page); 
    }



}