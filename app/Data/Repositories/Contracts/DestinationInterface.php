<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:58 PM
 */

namespace App\Data\Repositories\Contracts;


interface DestinationInterface
{

    public function getBySlug($slug);
    public function getByScope(array $scopes);
    public function getAllPublishedDestination();

}