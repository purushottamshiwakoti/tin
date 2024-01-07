<?php
namespace App\Domains\TravelStyles\Jobs;

use App\Data\Repositories\Contracts\TravelStyleInterface;
use Lucid\Units\Job;

class GetAllTravelStyleJob extends Job
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
    public function handle(TravelStyleInterface $travelStyleInterface)
    {
        return $travelStyleInterface->getByScope($this->scopes);
    }
    
}
