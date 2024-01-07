<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 1:40 PM
 */

namespace App\Data\Repositories\Eloquent;


use App\Data\Models\Attachment;
use App\Data\Repositories\Contracts\AttachmentInterface;
use App\Data\Repositories\Repository;

class AttachmentRepository extends Repository implements AttachmentInterface
{

    public function __construct(Attachment $model)
    {
        parent::__construct($model);
    }

}