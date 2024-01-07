<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 1:40 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Media;
use App\Data\Repositories\Contracts\MediaInterface;
use App\Data\Repositories\Repository;

class MediaRepository extends Repository implements MediaInterface
{

    public function __construct(Media $model)
    {
        parent::__construct($model);
    }

}