<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 8/27/18
 * Time: 1:13 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\CustomField;
use App\Data\Repositories\Contracts\CustomFieldInterface;
use App\Data\Repositories\Repository;

class CustomFieldRepository extends Repository implements CustomFieldInterface
{

    public function __construct(CustomField $model)
    {
        parent::__construct($model);
    }


    public function getDatatablePaginated($attributes, $items = 10, $orderBy = 'created_at', $orderType = 'desc')
    {
        $this->model->where($attributes);

        return datatables()->of($this->model->query())->toJson()->original;
    }

    public function findOneByExtra($value)
    {
        return $this->model->where('extras','like','%'.$value.'%')->first();
    }

   
}