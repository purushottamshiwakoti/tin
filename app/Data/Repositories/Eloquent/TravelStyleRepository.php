<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:59 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\TravelStyle;
use App\Data\Repositories\Repository;
use App\Data\Models\TripsTravelStylePivot;
use App\Data\Repositories\Contracts\TravelStyleInterface;

class TravelStyleRepository extends Repository implements TravelStyleInterface
{

    public function __construct(TravelStyle $model)
    {
        parent::__construct($model);
    }

    public function getBySlug($slug)
    {
        return $this->findBy('slug',$slug);
    }

    public function deleteTravelStyle($id)
    {
        $travelStyle = $this->findById($id);
        $counter = $travelStyle->trips()->count();
        if($counter<=0)
        {
           return $this->remove($id);
        }
        else{
            return response()->json(['status'=>false,'message' => 'It is used in some trips so cannot delete.']);
        }
    }

}