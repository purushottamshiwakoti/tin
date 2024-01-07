<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 2/28/19
 * Time: 12:11 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\LandingInquiry;
use App\Data\Repositories\Contracts\LandingInquiryInterface;
use App\Data\Repositories\Repository;

class LandingInquiryRepository extends Repository implements LandingInquiryInterface
{
    public function __construct(LandingInquiry $model)
    {
        parent::__construct($model);
    }

}