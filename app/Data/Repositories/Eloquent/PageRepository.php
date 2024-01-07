<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 12:08 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Page;
use App\Data\Repositories\Contracts\PageInterface;
use App\Data\Repositories\Repository;

class PageRepository extends Repository implements PageInterface
{

    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function syncPages($modelInstance,$ids)
    {
        return $modelInstance->relatedPages()->sync($ids);
    }

    public function syncTrips($modelInstance,$ids)
    {
        return $modelInstance->featuredTrips()->sync($ids);
    }
}