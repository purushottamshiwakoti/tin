<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 1:28 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Category;
use App\Data\Repositories\Contracts\CategoryInterface;
use App\Data\Repositories\Repository;

class CategoryRepository extends Repository implements CategoryInterface
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

}