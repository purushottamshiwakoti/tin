<?php
namespace App\Domains\Teams\Jobs;

use App\Data\Repositories\Contracts\TeamInterface;
use App\Data\Repositories\Contracts\TestimonialInterface;
use Lucid\Units\Job;

class GetAllTeamJob extends Job
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
    public function handle(TeamInterface $teamInterface)
    {
        return $teamInterface->getByScope($this->scopes);
    }
    
}
