<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetAllPaginateTripJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
  
   
  
 
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TripInterface $trip)
    {
        return $trip->getAllPaginateTrip();

    }
   
}
