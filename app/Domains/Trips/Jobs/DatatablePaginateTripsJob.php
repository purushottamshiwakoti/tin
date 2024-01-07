<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\TripInterface;
use Lucid\Units\Job;

class DatatablePaginateTripsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $search;
    private $limit;
    public function __construct($search = [], $limit = 20)
    {
        $this->search = $search;
        $this->limit = $limit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TripInterface $trip)
    {
        return $trip->getDatatablePaginated($this->search,$this->limit);
    }
}
