<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/25/18
 * Time: 2:58 PM
 */

namespace App\Data\Repositories\Contracts;


interface TripInterface
{

    public function storeTrip($data = []);
    public function updateTrip($id,$data = []);

    public function getPublishTypes();
    public function getAllTrip();
    public function getAllPaginateTrip();
    public function getActivitiesByTrip($slug);
    public function getDestinationByTrip($slug);

    public function getTripByDestinationAndActivity($destination, $activity);


    public function searchTrips($attributes,$query,$operator = 'like',$type='or');

    public function getHotDealsByTripableType($type,$id);

    public function findSingleTrip(int $id);
    public function getByScope(array $scopes);
    public function getOtherPackages($trip);
    public function getAjaxTrip($data);

    public function getTripsAsOption();

}