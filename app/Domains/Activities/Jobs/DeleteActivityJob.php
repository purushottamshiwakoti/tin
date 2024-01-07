<?php
namespace App\Domains\Activities\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use Lucid\Units\Job;

class DeleteActivityJob extends Job
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
    public function handle(ActivityInterface $activity)
    {
        return $activity->remove($this->id);
    }
}
