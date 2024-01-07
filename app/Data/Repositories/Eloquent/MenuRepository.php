<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 8/23/18
 * Time: 2:43 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Menu;
use App\Data\Repositories\Contracts\MenuInterface;
use App\Data\Repositories\Repository;

class MenuRepository extends Repository implements MenuInterface
{

    public function __construct(Menu $model)
    {
        parent::__construct($model);
    }

}