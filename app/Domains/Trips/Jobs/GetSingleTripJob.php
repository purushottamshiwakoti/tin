<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetSingleTripJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param TripInterface $trip
     * @return mixed
     */
    public function handle(TripInterface $trip)
    {
        return $trip->findSingleTrip($this->id);
    }
}
