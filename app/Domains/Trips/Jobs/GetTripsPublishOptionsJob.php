<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetTripsPublishOptionsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TripInterface $trip)
    {
        return $trip->getPublishTypes();
    }
}
