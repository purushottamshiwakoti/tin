<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 9/19/18
 * Time: 3:14 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\ExtraValue;
use App\Data\Repositories\Contracts\ExtraValueInterface;
use App\Data\Repositories\Repository;

class ExtraValueRepository extends Repository implements ExtraValueInterface
{

    public function __construct(ExtraValue $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $type
     * @return array
     */
    public function getExtraKeysListByType($type)
    {
        return $this->getColumnValuesAsArray('key',['type'=>$type]);
    }
}