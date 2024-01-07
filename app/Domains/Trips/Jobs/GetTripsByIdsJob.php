<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetTripsByIdsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $trip_ids;
    public function __construct($trip_ids)
    {
        $this->trip_ids = $trip_ids;
    }

    /**
     * @param TripInterface $trip
     * @return mixed
     */
    public function handle(TripInterface $trip)
    {
        $wishlist = $trip->getTripByIds(explode(',',$this->trip_ids));
        return $wishlist->map(function ($item){
            $item->first_image = $item->getFirstImage();
            return $item;
        });
    }
}
