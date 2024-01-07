<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetAllDestinationActivityTripJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
  
   
    public function __construct($destination,$activity)
    {
        $this->destination = $destination;
        $this->activity = $activity;
    }
  
 
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TripInterface $trip)
    {
        // dd($this->id);
        return $trip->getTripByDestinationAndActivity($this->destination, $this->activity);

    }
   
}
