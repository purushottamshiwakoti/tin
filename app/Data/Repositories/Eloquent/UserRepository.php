<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/20/18
 * Time: 12:01 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\User;
use App\Data\Repositories\Contracts\UserInterface;
use App\Data\Repositories\Repository;

class UserRepository extends Repository implements UserInterface
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}