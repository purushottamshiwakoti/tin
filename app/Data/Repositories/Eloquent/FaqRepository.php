<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/29/18
 * Time: 1:14 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Faq;
use App\Data\Repositories\Contracts\FaqInterface;
use App\Data\Repositories\Repository;

class FaqRepository extends Repository implements FaqInterface
{

    public function __construct(Faq $model)
    {
        parent::__construct($model);
    }


    public function getData()
    {
        return $this->model->where('publish',1)->orderBy('created_at','desc')->get();
    }

}