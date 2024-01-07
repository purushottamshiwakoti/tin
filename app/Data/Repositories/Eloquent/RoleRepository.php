<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/10/18
 * Time: 1:27 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Role;
use App\Data\Repositories\Contracts\RoleInterface;
use App\Data\Repositories\Repository;

class RoleRepository extends Repository implements RoleInterface
{

    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

}