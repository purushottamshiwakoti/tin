<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 12:16 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Offer;
use App\Data\Repositories\Contracts\OfferInterface;
use App\Data\Repositories\Repository;

class OfferRepository extends Repository implements OfferInterface
{

    public function __construct(Offer $model)
    {
        parent::__construct($model);
    }

}