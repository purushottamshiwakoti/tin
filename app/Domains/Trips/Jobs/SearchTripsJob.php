<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class SearchTripsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $attributes;
    private $query;
    private $filters;
    public function __construct($attributes = [],$query,$filters = [])
    {
        $this->attributes = $attributes;
        $this->query = $query;
        $this->filters = $filters;
    }

    /**
     * @param TripInterface $trip
     * @return mixed
     */
    public function handle(TripInterface $trip)
    {
        $trips = $trip->searchTrips($this->attributes,$this->query,$this->filters);
    //    print_r($trips);exit;

        $trips->getCollection()->transform(function ($item){
            $item->first_image = $item->getFirstImage();
            return $item;

        });
        return $trips;
    }
}
