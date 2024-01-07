<?php
namespace App\Domains\Trips\Jobs;

use App\Data\Repositories\Contracts\FixedDepartureInterface;
use Lucid\Units\Job;

class GetDepartureAvailabilityJob extends Job
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
    public function handle(FixedDepartureInterface $departure)
    {
        return $departure->getDepartureAvailabilities();
    }
}
