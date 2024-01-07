<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:56 PM
 */

namespace App\Data\Traits;


use App\Data\Models\Trip;

trait TripableTrait
{

    public function trips()
    {
        return $this->morphMany(Trip::class,'tripable');
    }
}