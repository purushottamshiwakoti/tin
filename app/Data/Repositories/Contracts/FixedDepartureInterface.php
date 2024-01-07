<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/12/18
 * Time: 2:54 PM
 */

namespace App\Data\Repositories\Contracts;


interface FixedDepartureInterface
{

    public function getDepartureAvailabilities();
    public function getDepartureArchives();
    public function getByScope(array $scopes);
    public function getDepartureUpcomingTrip($data);

    public function findOrNew($id,$trip);
}