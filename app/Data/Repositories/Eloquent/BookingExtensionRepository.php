<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/14/18
 * Time: 2:18 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\BookingExtension;
use App\Data\Repositories\Contracts\BookingExtensionInterface;
use App\Data\Repositories\Repository;

class BookingExtensionRepository extends Repository implements BookingExtensionInterface
{

    public function __construct(BookingExtension $model)
    {
        parent::__construct($model);
    }
}