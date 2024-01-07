<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetAllDestinationTripJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
  
   
    public function __construct($slug)
    {
        $this->slug = $slug;
    }
  
 
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TripInterface $trip)
    {
        // dd($this->id);
        return $trip->getDestinationByTrip($this->slug);

    }
   
}
