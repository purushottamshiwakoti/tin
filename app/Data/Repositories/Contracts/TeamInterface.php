<?php


namespace App\Data\Repositories\Contracts;


interface TeamInterface
{

    public function getBySlug($slug);

}