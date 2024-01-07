<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 10:06 AM
 */

namespace App\Data\Traits;


use App\Data\Models\Rating;

trait RatableTrait
{

    public function ratings()
    {
        return $this->morphMany(Rating::class,'ratable');
    }


    public function publishedRatings()
    {
        return $this->morphMany(Rating::class,'ratable')->published()->latest();
    }
}