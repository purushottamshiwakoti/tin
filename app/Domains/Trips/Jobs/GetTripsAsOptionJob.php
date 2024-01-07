<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetTripsAsOptionJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * @param TripInterface $trip
     * @return mixed
     */
    public function handle(TripInterface $trip)
    {
        return $trip->getTripsAsOption();        
    }
}
