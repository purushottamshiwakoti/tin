<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:58 PM
 */

namespace App\Data\Repositories\Contracts;


interface ActivityInterface
{
    public function getPublishTypes();
    public function getAllActivity();
    public function findBySlug($slug);
    public function getByScope(array $scopes);
    public function getActivitiesByDestination($destinationslug);
    public function getNepalActivities($destinationslug);

}