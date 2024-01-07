<?php
namespace App\Domains\Activities\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use Lucid\Units\Job;

class StoreActivityJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ActivityInterface $activity)
    {
        return $activity->fillAndSave($this->data);
    }
}
