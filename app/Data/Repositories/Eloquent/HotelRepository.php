<?php

namespace App\Data\Repositories\Eloquent;

use App\Data\Models\Hotel;
use App\Data\Models\HotelBooking;
use App\Data\Repositories\Contracts\HotelInterface;
use App\Data\Repositories\Repository;

class HotelRepository extends Repository implements HotelInterface
{

    public function __construct(Hotel $model)
    {
        parent::__construct($model);
    }
}