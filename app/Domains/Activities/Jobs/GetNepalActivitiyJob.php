<?php
namespace App\Domains\Activities\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use App\Data\Repositories\Contracts\DestinationInterface;
use Lucid\Units\Job;

class GetNepalActivitiyJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($destinationSlug)
    {
        $this->destinationSlug = $destinationSlug;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ActivityInterface $activityInterface)
    {
        return $activityInterface->getNepalActivities($this->destinationSlug);
    }
}