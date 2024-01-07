<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 9/4/18
 * Time: 3:18 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Notification;
use App\Data\Repositories\Contracts\NotificationInterface;
use App\Data\Repositories\Repository;

class NotificationRepository extends Repository implements NotificationInterface
{

    public function __construct(Notification $model)
    {
        parent::__construct($model);
    }

}