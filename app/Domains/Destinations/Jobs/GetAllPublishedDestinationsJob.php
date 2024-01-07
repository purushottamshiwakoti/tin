<?php
namespace App\Domains\Destinations\Jobs;

use App\Data\Repositories\Contracts\DestinationInterface;
use Lucid\Units\Job;

class GetAllPublishedDestinationsJob extends Job
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
    public function handle(DestinationInterface $destination)
    {
        return $destination->getAllPublishedDestination();
    }
    
}
