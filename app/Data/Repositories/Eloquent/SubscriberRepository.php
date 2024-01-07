<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/14/18
 * Time: 1:40 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Subscriber;
use App\Data\Repositories\Contracts\SubscriberInterface;
use App\Data\Repositories\Repository;

class SubscriberRepository extends Repository implements SubscriberInterface
{

    public function __construct(Subscriber $model)
    {
        parent::__construct($model);
    }

}