<?php


namespace App\Data\Repositories\Eloquent;

use App\Data\Models\Testimonials;

use App\Data\Repositories\Contracts\TestimonialInterface;
use App\Data\Repositories\Repository;

class TestimonialRepository extends Repository implements TestimonialInterface
{

    public function __construct(Testimonials $model)
    {
        parent::__construct($model);
    }

    public function getBySlug($slug)
    {
       
        return $this->findBy('slug',$slug);
    }



}