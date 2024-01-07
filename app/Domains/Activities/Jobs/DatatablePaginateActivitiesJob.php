<?php
namespace App\Domains\Activities\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use Lucid\Units\Job;

class DatatablePaginateActivitiesJob extends Job
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
    public function handle(ActivityInterface $activity)
    {
        return $activity->getDatatablePaginated($this->search,$this->limit);
    }
}
