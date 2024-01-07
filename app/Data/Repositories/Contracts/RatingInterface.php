<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/26/18
 * Time: 10:46 AM
 */

namespace App\Data\Repositories\Contracts;


interface RatingInterface
{
     public function getPublishCommnet();
     public function getTotalTripReview();
     public function getTotalTripReviewRatingValue();
}