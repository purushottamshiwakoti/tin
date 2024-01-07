<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class GetScopedTripsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $scopes;
    public function __construct($scopes)
    {
        $this->scopes = $scopes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TripInterface $trip)
    {
        return $trip->getByScope($this->scopes);
    }
   
}
