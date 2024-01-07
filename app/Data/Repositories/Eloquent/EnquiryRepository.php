<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/27/18
 * Time: 1:48 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Enquiry;
use App\Data\Repositories\Contracts\EnquiryInterface;
use App\Data\Repositories\Repository;

class EnquiryRepository extends Repository implements EnquiryInterface
{

    public function __construct(Enquiry $model)
    {
        parent::__construct($model);
    }

}