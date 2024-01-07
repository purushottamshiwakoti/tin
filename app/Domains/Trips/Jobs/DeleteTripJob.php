<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class DeleteTripJob extends Job
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(TripInterface $trip)
    {
        return $trip->deleteTrip($this->id,$trip);
    }
}
