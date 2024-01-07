<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 12:21 PM
 */

namespace App\Data\Traits;


use App\Data\Models\Offer;

trait OfferableTrait
{

    public function offers()
    {
        return $this->morphMany(Offer::class,'offerable');
    }

    public function publishedOffers()
    {
        return $this->offers()->published();
    }
}