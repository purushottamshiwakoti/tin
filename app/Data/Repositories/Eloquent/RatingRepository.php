<?php

/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 10:46 AM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Rating;
use App\Data\Repositories\Contracts\RatingInterface;
use App\Data\Repositories\Repository;

class RatingRepository extends Repository implements RatingInterface
{

    public function __construct(Rating $model)
    {
        parent::__construct($model);
    }

    public function getPublishCommnet()
    {
        return $this->model->where('publish', 1)->where('title', 'comment')->get();
    }

    public function getTotalTripReview()

    {

        return $this->model->where('ratable_type', 'trip')->get();

    }

    public function getTotalTripReviewRatingValue()

    {

        $a= $this->model->where('ratable_type', 'trip')->sum('rating_value');
        return $a;

    }
}