<?php
namespace App\Domains\Activities\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use Lucid\Units\Job;

class GetAllActivitiesJob extends Job
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
    public function handle(ActivityInterface $activity)
    {
        return $activity->getAllActivity();
    }
}