<?php
namespace App\Domains\Activities\Jobs;

use App\Data\Repositories\Contracts\ActivityInterface;
use App\Data\Repositories\Eloquent\ActivityRepository;
use Lucid\Units\Job;

class GetScopedActivitiesJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $scopes;
    public function __construct($scopes = ['published'])
    {
        $this->scopes = $scopes;
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ActivityInterface $activity)
    {
        return $activity->getByScope($this->scopes);
    }
    
}
