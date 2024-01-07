<?php

/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:59 PM
 */

namespace App\Data\Repositories\Eloquent;

use App\Data\Models\Destination;
use App\Data\Models\Post;
use App\Data\Models\TravelStyle;
use App\Data\Models\Trip;
use App\Data\Models\TripsTravelStylePivot;
use App\Data\Repositories\Contracts\BlogInterface;
use App\Data\Repositories\Contracts\TripInterface;
use App\Data\Repositories\Repository;
use Illuminate\Support\Facades\DB;

class BlogRepository extends Repository implements BlogInterface
{

    public function __construct(Post $model)
    {
        parent::__construct($model);
    }



    /**
     * @param int $id
     * @return mixed
     */
  

    public function getOtherBlogs($trip)
    {
        return $this->model->where('publish', 1)->where('id', '!=', $trip->id)->orderBy('created_at', 'desc')->get();
    }

  

 

 
}
