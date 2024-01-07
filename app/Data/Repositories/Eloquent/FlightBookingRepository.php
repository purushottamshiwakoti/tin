<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 8/21/18
 * Time: 1:44 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\FlightBooking;
use App\Data\Repositories\Contracts\FlightBookingInterface;
use App\Data\Repositories\Repository;

class FlightBookingRepository extends Repository implements FlightBookingInterface
{

    public function __construct(FlightBooking $model)
    {
        parent::__construct($model);
    }
}