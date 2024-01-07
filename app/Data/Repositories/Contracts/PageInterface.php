<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 12:08 PM
 */

namespace App\Data\Repositories\Contracts;


interface PageInterface
{

    public function syncPages($modelInstance, $ids);
    public function syncTrips($modelInstance, $ids);
    public function findBySlug($slug);
}