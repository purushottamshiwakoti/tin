<?php


namespace App\Data\Repositories\Contracts;


interface PlaceInterface
{

    public function getBySlug($slug);
    
    public function getPublishTypes();
    
    public function getFlightPlaces();
    
    public function getHotelPlaces();
    
  



}